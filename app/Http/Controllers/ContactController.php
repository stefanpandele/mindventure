<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Handle the homepage contact form submission.
     */
    public function store(ContactRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Mail::to(config('mail.contact_to'))->send(new ContactMessage(
            senderName: $validated['name'],
            senderEmail: $validated['email'],
            messageBody: $validated['message'],
        ));

        return back()
            ->with('contact_status', 'Mesaj expediat. Te contactăm.')
            ->withFragment('contact');
    }
}
