<?php

namespace Tests\Feature;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class BookSessionCapiTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Mail::fake();
        Http::fake();

        config([
            'services.meta.enabled' => true,
            'services.meta.pixel_id' => '1234567890',
            'services.meta.capi_token' => 'test-token',
            'services.meta.api_version' => 'v21.0',
            'services.meta.test_event_code' => null,
        ]);
    }

    /**
     * @param  array<string, mixed>  $overrides
     * @return array<string, mixed>
     */
    private function payload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Ana Popescu',
            'email' => 'Ana@Example.com',
            'phone' => '0722 123 456',
            'question' => 'Aș dori detalii despre grupele de IB Math.',
            'section' => 'ib-math',
            'event_id' => 'evt-abc-123',
        ], $overrides);
    }

    /**
     * A visitor who accepted the cookie banner. Without that cookie the
     * controller sends nothing to Meta at all.
     */
    private function consented(): self
    {
        return $this->withUnencryptedCookie('mv_consent', 'granted');
    }

    public function test_it_sends_a_lead_event_to_meta(): void
    {
        $this->consented()->from('/ib-math')->post('/book-session', $this->payload())
            ->assertRedirect();

        Http::assertSent(function (Request $request) {
            $event = $request->data()['data'][0];

            return $request->url() === 'https://graph.facebook.com/v21.0/1234567890/events'
                && $event['event_name'] === 'Lead'
                && $event['action_source'] === 'website'
                && $event['custom_data']['content_name'] === 'ib-math'
                && $request->data()['access_token'] === 'test-token';
        });
    }

    public function test_it_reuses_the_browser_event_id_so_meta_can_deduplicate(): void
    {
        $this->consented()->from('/ib-math')->post('/book-session', $this->payload());

        Http::assertSent(fn (Request $request) => $request->data()['data'][0]['event_id'] === 'evt-abc-123');
    }

    public function test_it_generates_an_event_id_when_the_request_omits_one(): void
    {
        $this->consented()->from('/ib-math')->post('/book-session', $this->payload(['event_id' => null]));

        Http::assertSent(fn (Request $request) => filled($request->data()['data'][0]['event_id']));
    }

    public function test_it_hashes_identifiers_and_never_sends_them_in_the_clear(): void
    {
        $this->consented()->from('/ib-math')->post('/book-session', $this->payload());

        Http::assertSent(function (Request $request) {
            $userData = $request->data()['data'][0]['user_data'];

            return $userData['em'] === [hash('sha256', 'ana@example.com')]
                && $userData['fn'] === [hash('sha256', 'ana')]
                && $userData['ln'] === [hash('sha256', 'popescu')]
                // Romanian trunk prefix swapped for the country code.
                && $userData['ph'] === [hash('sha256', '40722123456')];
        });

        Http::assertSent(fn (Request $request) => ! str_contains($request->body(), 'Example.com')
            && ! str_contains($request->body(), 'Popescu'));
    }

    public function test_it_forwards_the_facebook_browser_cookies_for_match_quality(): void
    {
        $this->consented()->from('/ib-math')
            ->withUnencryptedCookies([
                '_fbp' => 'fb.1.1700000000.123456',
                '_fbc' => 'fb.1.1700000000.IwAR123',
            ])
            ->post('/book-session', $this->payload());

        Http::assertSent(function (Request $request) {
            $userData = $request->data()['data'][0]['user_data'];

            return $userData['fbp'] === 'fb.1.1700000000.123456'
                && $userData['fbc'] === 'fb.1.1700000000.IwAR123';
        });
    }

    public function test_it_attributes_the_lead_to_the_page_the_form_was_submitted_from(): void
    {
        $this->consented()->from('https://mindventure.ro/ib-math')->post('/book-session', $this->payload());

        Http::assertSent(fn (Request $request) => $request->data()['data'][0]['event_source_url'] === 'https://mindventure.ro/ib-math');
    }

    public function test_it_sends_nothing_when_disabled(): void
    {
        config(['services.meta.enabled' => false]);

        $this->consented()->from('/ib-math')->post('/book-session', $this->payload());

        Http::assertNothingSent();
    }

    public function test_it_sends_nothing_when_credentials_are_missing(): void
    {
        config(['services.meta.capi_token' => null]);

        $this->consented()->from('/ib-math')->post('/book-session', $this->payload());

        Http::assertNothingSent();
    }

    public function test_a_failing_meta_request_does_not_break_the_submission(): void
    {
        Http::fake(['graph.facebook.com/*' => Http::response(['error' => 'nope'], 500)]);

        $this->consented()->from('/ib-math')->post('/book-session', $this->payload())
            ->assertRedirect()
            ->assertSessionHasNoErrors();
    }

    public function test_an_invalid_event_id_is_rejected_by_validation(): void
    {
        $this->consented()->from('/ib-math')
            ->post('/book-session', $this->payload(['event_id' => str_repeat('x', 65)]))
            ->assertSessionHasErrors('event_id');

        Http::assertNothingSent();
    }

    public function test_it_sends_nothing_when_the_visitor_has_not_answered_the_cookie_banner(): void
    {
        $this->from('/ib-math')->post('/book-session', $this->payload())
            ->assertRedirect();

        Http::assertNothingSent();
    }

    public function test_it_sends_nothing_when_the_visitor_refused_cookies(): void
    {
        $this->withUnencryptedCookie('mv_consent', 'denied')
            ->from('/ib-math')
            ->post('/book-session', $this->payload())
            ->assertRedirect();

        Http::assertNothingSent();
    }

    /**
     * The consent banner blocks the page until it is answered, so a lead with
     * no decision at all should be unreachable. If one arrives anyway, the
     * banner has stopped covering some path and the lead went unreported on
     * both channels — which is invisible unless it is written down.
     */
    public function test_it_warns_when_a_lead_arrives_with_no_consent_decision(): void
    {
        Log::spy();

        $this->from('/ib-math')->post('/book-session', $this->payload())
            ->assertRedirect();

        Log::shouldHaveReceived('warning')
            ->once()
            ->withArgs(fn (string $message, array $context) => str_contains($message, 'no cookie consent decision')
                && $context['section'] === 'ib-math'
                && $context['page'] === '/ib-math'
                && $context['consent'] === 'absent');
    }

    /**
     * The banner treats anything that is not `granted` or `denied` as an
     * unanswered question, so the server has to count it as one too.
     */
    public function test_it_warns_when_the_consent_cookie_holds_an_unrecognised_value(): void
    {
        Log::spy();

        $this->withUnencryptedCookie('mv_consent', 'maybe')
            ->from('/ib-math')
            ->post('/book-session', $this->payload())
            ->assertRedirect();

        Http::assertNothingSent();

        Log::shouldHaveReceived('warning')
            ->once()
            ->withArgs(fn (string $message, array $context) => $context['consent'] === 'unrecognised');
    }

    /**
     * The raw cookie is attacker-controlled, so the log records which of the
     * two cases occurred rather than echoing whatever was sent.
     */
    public function test_it_never_writes_the_raw_consent_cookie_to_the_log(): void
    {
        Log::spy();

        $this->withUnencryptedCookie('mv_consent', 'surprise-payload')
            ->from('/ib-math')
            ->post('/book-session', $this->payload());

        Log::shouldHaveReceived('warning')
            ->withArgs(fn (string $message, array $context) => ! str_contains($message.json_encode($context), 'surprise-payload'));
    }

    /**
     * Nothing was lost if the Conversions API is switched off to begin with,
     * and local development submits this form without consent all the time.
     */
    public function test_it_stays_quiet_when_meta_reporting_is_switched_off(): void
    {
        config(['services.meta.enabled' => false]);

        Log::spy();

        $this->from('/ib-math')->post('/book-session', $this->payload());

        Log::shouldNotHaveReceived('warning');
    }

    public function test_the_consent_warning_carries_no_personal_data(): void
    {
        Log::spy();

        $this->from('/ib-math')->post('/book-session', $this->payload());

        Log::shouldHaveReceived('warning')
            ->withArgs(function (string $message, array $context) {
                $written = $message.json_encode($context);

                return ! str_contains($written, 'Ana')
                    && ! str_contains($written, 'Popescu')
                    && ! str_contains(mb_strtolower($written), 'example.com')
                    && ! str_contains($written, '0722');
            });
    }

    /**
     * A refusal is an ordinary outcome: the banner closes, the page unblocks
     * and the visitor is free to book. Warning about it would bury the one
     * case that actually signals a bug.
     */
    public function test_it_stays_quiet_when_the_visitor_refused_cookies(): void
    {
        Log::spy();

        $this->withUnencryptedCookie('mv_consent', 'denied')
            ->from('/ib-math')
            ->post('/book-session', $this->payload());

        Log::shouldNotHaveReceived('warning');
    }

    public function test_it_stays_quiet_when_the_visitor_consented(): void
    {
        Log::spy();

        $this->consented()->from('/ib-math')->post('/book-session', $this->payload());

        Log::shouldNotHaveReceived('warning');
    }
}
