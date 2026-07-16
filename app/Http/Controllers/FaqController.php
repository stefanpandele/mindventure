<?php

namespace App\Http\Controllers;

use App\Http\Requests\FaqAskRequest;
use App\Mail\FaqQuestion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class FaqController extends Controller
{
    /**
     * Handle a question submitted from the FAQ "ask" modal.
     */
    public function ask(FaqAskRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Mail::to(config('mail.contact_to'))->send(new FaqQuestion(
            senderName: $validated['name'],
            senderEmail: $validated['email'],
            senderPhone: $validated['tel'] ?? null,
            question: $validated['question'],
            section: $validated['section'],
        ));

        return back()->withFragment('faq');
    }
}
