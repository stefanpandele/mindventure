<?php

namespace Tests\Feature;

use Inertia\Testing\AssertableInertia;
use Tests\TestCase;

class LocaleSwitchTest extends TestCase
{
    public function test_switching_locale_stores_it_in_session_and_redirects_back(): void
    {
        $response = $this->from('/')->get('/locale/en');

        $response->assertRedirect('/');
        $this->assertSame('en', session('locale'));
    }

    public function test_invalid_locale_is_rejected(): void
    {
        $this->get('/locale/de')->assertStatus(400);
    }

    public function test_selected_locale_is_shared_to_inertia(): void
    {
        $this->withSession(['locale' => 'en']);

        $this->get('/')->assertInertia(
            fn (AssertableInertia $page) => $page
                ->where('locale', 'en')
                ->where('translations', fn ($translations) => $translations['nav.home'] === 'Home')
        );
    }

    public function test_default_locale_is_romanian(): void
    {
        $this->get('/')->assertInertia(
            fn (AssertableInertia $page) => $page->where('locale', 'ro')
        );
    }
}
