<?php

namespace App\View\Composers;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

/**
 * Binds the per-page title, description and canonical URL to the root template.
 *
 * These have to be rendered server side: the site ships no SSR, so anything
 * Inertia's <Head> writes on the client is invisible to a crawler that only
 * reads the initial HTML response.
 */
class SeoComposer
{
    /**
     * Route name => translation key segment used under the `seo.` namespace.
     *
     * @var array<string, string>
     */
    private const PAGES = [
        'home' => 'home',
        'about' => 'about',
        'ib-math' => 'ib_math',
        'ib-ia' => 'ib_ia',
        'junior' => 'junior',
        'contact' => 'contact',
        'terms-and-conditions' => 'terms',
        'privacy-policy' => 'privacy',
    ];

    /**
     * Bind the SEO data for the page currently being rendered.
     */
    public function compose(View $view): void
    {
        $page = self::PAGES[Route::currentRouteName()] ?? 'home';

        $view->with('seo', [
            'title' => __("seo.{$page}.title"),
            'description' => __("seo.{$page}.description"),
            'canonical' => url()->current(),
            'ogLocale' => app()->getLocale() === 'en' ? 'en_US' : 'ro_RO',
        ]);
    }
}
