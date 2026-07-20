<?php

namespace Tests\Feature;

use Tests\TestCase;

class CookieConsentTest extends TestCase
{
    public function test_it_never_loads_google_tag_manager_from_the_server(): void
    {
        config([
            'services.gtm.enabled' => true,
            'services.gtm.id' => 'GTM-TEST123',
        ]);

        $response = $this->get('/');

        // The loader lives in resources/js/lib/gtm.ts and only runs once the
        // visitor accepts, so neither the script nor the noscript iframe may
        // appear in the rendered document.
        $response->assertDontSee('googletagmanager.com/gtm.js', escape: false);
        $response->assertDontSee('googletagmanager.com/ns.html', escape: false);
    }

    public function test_it_exposes_the_container_id_for_the_consent_gated_loader(): void
    {
        config([
            'services.gtm.enabled' => true,
            'services.gtm.id' => 'GTM-TEST123',
        ]);

        $this->get('/')
            ->assertSee('<meta name="gtm-id" content="GTM-TEST123">', escape: false);
    }

    public function test_it_omits_the_container_id_when_tag_manager_is_disabled(): void
    {
        config([
            'services.gtm.enabled' => false,
            'services.gtm.id' => 'GTM-TEST123',
        ]);

        $this->get('/')->assertDontSee('name="gtm-id"', escape: false);
    }
}
