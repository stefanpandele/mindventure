<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookSessionRequest;
use App\Mail\BookSession;
use App\Mail\BookSessionConfirmation;
use App\Services\MetaConversionsApi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class BookSessionController extends Controller
{
    /**
     * Handle a question submitted from the FAQ "ask" modal.
     */
    public function __invoke(BookSessionRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Mail::to(config('mail.contact_to'))
            ->send(new BookSession(
                senderName: $validated['name'],
                senderEmail: $validated['email'],
                senderPhone: $validated['phone'],
                question: $validated['question'] ?? '',
                section: $validated['section'],
            ));

        Mail::to($validated['email'])
            ->locale(app()->getLocale())
            ->send(new BookSessionConfirmation(
                senderName: $validated['name'],
                senderEmail: $validated['email'],
                senderPhone: $validated['phone'],
                question: $validated['question'] ?? '',
                section: $validated['section'],
            ));

        $this->reportLeadToMeta($validated, $request);

        return back();
    }

    /**
     * Mirror the browser pixel's Lead event server-side.
     *
     * Dispatched after the response so an unreachable Meta endpoint never
     * delays the visitor's submission. Runs in-process rather than on the
     * queue, which has no worker in this application.
     *
     * Skipped entirely unless the visitor accepted cookies. The server has to
     * check for itself: the browser pixel is gated by not loading GTM, but this
     * call would otherwise still send hashed contact details to Meta.
     *
     * A refusal is an ordinary outcome — the banner closes and the visitor is
     * free to book. An unanswered banner is not: it covers the page until the
     * visitor decides, so a lead cannot be submitted while undecided. One that
     * arrives anyway means some path slipped past the banner, and it reported
     * on neither channel. That is invisible unless it is written down.
     *
     * "Unanswered" matches what the banner itself treats as unanswered: any
     * cookie that is neither `granted` nor `denied`, missing ones included.
     *
     * @param  array<string, mixed>  $validated
     */
    private function reportLeadToMeta(array $validated, BookSessionRequest $request): void
    {
        $consent = $this->cookieString($request, 'mv_consent');

        if ($consent !== 'granted') {
            // Nothing was lost while the Conversions API is switched off, which
            // is its normal state on local and dev.
            if ($consent !== 'denied' && config('services.meta.enabled')) {
                Log::warning('Booking lead arrived with no cookie consent decision; nothing reported to Meta.', [
                    'section' => $validated['section'],
                    'page' => $request->headers->get('referer'),
                    // Which case it was, never the cookie itself: that value
                    // comes from the request and has no business in the log.
                    'consent' => $consent === null ? 'absent' : 'unrecognised',
                ]);
            }

            return;
        }

        $eventId = $validated['event_id'] ?? (string) Str::uuid();

        $userData = [
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'name' => $validated['name'],
        ];

        // The form posts from whichever page the modal was opened on, so the
        // referer is the page Meta should attribute the lead to.
        $context = array_filter([
            'event_source_url' => $request->headers->get('referer'),
            'client_ip_address' => $request->ip(),
            'client_user_agent' => $request->userAgent(),
            'fbp' => $this->cookieString($request, '_fbp'),
            'fbc' => $this->cookieString($request, '_fbc'),
        ]);

        $customData = ['content_name' => $validated['section']];

        dispatch(function () use ($eventId, $userData, $context, $customData) {
            app(MetaConversionsApi::class)->send('Lead', $eventId, $userData, $context, $customData);
        })->afterResponse();
    }

    /**
     * Read a cookie that must be a plain string, ignoring the array form a
     * crafted request could otherwise smuggle in (`_fbp[]=...`).
     */
    private function cookieString(BookSessionRequest $request, string $name): ?string
    {
        $value = $request->cookie($name);

        return is_string($value) ? $value : null;
    }
}
