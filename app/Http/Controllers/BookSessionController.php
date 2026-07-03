<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookSessionRequest;
use App\Mail\BookSession;
use App\Mail\FaqQuestion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class BookSessionController extends Controller
{
    /**
     * Handle a question submitted from the FAQ "ask" modal.
     */
    public function __invoke(BookSessionRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Mail::to(config('mail.contact_to'))->send(new BookSession(
            senderName: $validated['name'],
            senderEmail: $validated['email'],
            senderPhone: $validated['phone'],
            question: $validated['question'],
            section: $validated['section'],
        ));

        return back()->withFragment('faq');
    }
}
