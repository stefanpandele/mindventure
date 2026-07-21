<?php

namespace Tests\Feature;

use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
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

    public function test_it_sends_a_lead_event_to_meta(): void
    {
        $this->from('/ib-math')->post('/book-session', $this->payload())
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
        $this->from('/ib-math')->post('/book-session', $this->payload());

        Http::assertSent(fn (Request $request) => $request->data()['data'][0]['event_id'] === 'evt-abc-123');
    }

    public function test_it_generates_an_event_id_when_the_request_omits_one(): void
    {
        $this->from('/ib-math')->post('/book-session', $this->payload(['event_id' => null]));

        Http::assertSent(fn (Request $request) => filled($request->data()['data'][0]['event_id']));
    }

    public function test_it_hashes_identifiers_and_never_sends_them_in_the_clear(): void
    {
        $this->from('/ib-math')->post('/book-session', $this->payload());

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
        $this->from('/ib-math')
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
        $this->from('https://mindventure.ro/ib-math')->post('/book-session', $this->payload());

        Http::assertSent(fn (Request $request) => $request->data()['data'][0]['event_source_url'] === 'https://mindventure.ro/ib-math');
    }

    public function test_it_sends_nothing_when_disabled(): void
    {
        config(['services.meta.enabled' => false]);

        $this->from('/ib-math')->post('/book-session', $this->payload());

        Http::assertNothingSent();
    }

    public function test_it_sends_nothing_when_credentials_are_missing(): void
    {
        config(['services.meta.capi_token' => null]);

        $this->from('/ib-math')->post('/book-session', $this->payload());

        Http::assertNothingSent();
    }

    public function test_a_failing_meta_request_does_not_break_the_submission(): void
    {
        Http::fake(['graph.facebook.com/*' => Http::response(['error' => 'nope'], 500)]);

        $this->from('/ib-math')->post('/book-session', $this->payload())
            ->assertRedirect()
            ->assertSessionHasNoErrors();
    }

    public function test_an_invalid_event_id_is_rejected_by_validation(): void
    {
        $this->from('/ib-math')
            ->post('/book-session', $this->payload(['event_id' => str_repeat('x', 65)]))
            ->assertSessionHasErrors('event_id');

        Http::assertNothingSent();
    }
}
