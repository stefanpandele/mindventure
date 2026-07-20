<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookSessionRequest;
use App\Mail\BookSession;
use App\Mail\BookSessionConfirmation;
use App\Services\MetaConversionsApi;
use Illuminate\Http\RedirectResponse;
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
     * @param  array<string, mixed>  $validated
     */
    private function reportLeadToMeta(array $validated, BookSessionRequest $request): void
    {
        if ($this->cookieString($request, 'mv_consent') !== 'granted') {
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
