<?php

namespace Tests\Feature;

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    public function test_homepage_renders_the_inertia_component(): void
    {
        $this->get('/')
            ->assertOk()
            ->assertInertia(fn (Assert $page) => $page->component('Home'));
    }

    public function test_valid_submission_sends_mail_and_redirects_back(): void
    {
        Mail::fake();

        $response = $this->from('/')->post('/contact', [
            'name' => 'Ana Popescu',
            'email' => 'ana@example.com',
            'message' => 'Aș dori o sesiune de probă pentru fiul meu.',
            'gdpr' => '1',
            'website' => '', // empty honeypot, as the real form submits it
        ]);

        $response->assertRedirect();
        $response->assertSessionHas('contact_status');

        Mail::assertSent(ContactMessage::class, function (ContactMessage $mail) {
            return $mail->hasTo(config('mail.contact_to'))
                && $mail->senderEmail === 'ana@example.com';
        });
    }

    public function test_validation_errors_when_fields_missing(): void
    {
        Mail::fake();

        $this->from('/')
            ->post('/contact', [])
            ->assertSessionHasErrors(['name', 'email', 'message', 'gdpr']);

        Mail::assertNothingSent();
    }

    public function test_message_must_meet_minimum_length(): void
    {
        Mail::fake();

        $this->from('/')->post('/contact', [
            'name' => 'Ana',
            'email' => 'ana@example.com',
            'message' => 'scurt',
            'gdpr' => '1',
        ])->assertSessionHasErrors('message');

        Mail::assertNothingSent();
    }

    public function test_gdpr_consent_is_required(): void
    {
        Mail::fake();

        $this->from('/')->post('/contact', [
            'name' => 'Ana Popescu',
            'email' => 'ana@example.com',
            'message' => 'Aș dori o sesiune de probă pentru fiul meu.',
        ])->assertSessionHasErrors('gdpr');

        Mail::assertNothingSent();
    }

    public function test_honeypot_blocks_bot_submission(): void
    {
        Mail::fake();

        $this->from('/')->post('/contact', [
            'name' => 'Bot',
            'email' => 'bot@example.com',
            'message' => 'Spam spam spam spam spam.',
            'gdpr' => '1',
            'website' => 'http://spam.example',
        ])->assertSessionHasErrors('website');

        Mail::assertNothingSent();
    }
}
