<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

/**
 * Sends the previous static site's `.html` URLs to their closest equivalent.
 *
 * Google still has those URLs indexed (`/index-en.html`, for example) and every
 * one of them now dead-ends on a 404. A permanent redirect keeps the visitor on
 * the site and lets the search engine carry the old ranking over to the new page.
 */
class LegacyRedirectController extends Controller
{
    /**
     * Legacy file name, without the `.html` suffix, => route name and optional fragment.
     *
     * The old site kept a separate file per language rather than a language prefix,
     * so the Romanian and English names both appear here. `generic`, `terms` and
     * `termeni-conditii` were linked from its navigation but never existed as files.
     *
     * @var array<string, string>
     */
    private const MAP = [
        'index' => 'home',
        'index-en' => 'home',
        'generic' => 'home',

        /** "De ce Mindventure" and "Povestea Mindventure" both live on the About page now. */
        'despre' => 'about',
        'about' => 'about',
        'povestea' => 'about',
        'story' => 'about',

        /** "Metoda Mindventure" is now the how-we-work section of the homepage. */
        'metoda' => 'home',
        'method' => 'home',

        /** The old programmes covered ages 5-15 only, so they map to Junior. */
        'programe' => 'junior',
        'programs' => 'junior',

        'termenisiconditii' => 'terms-and-conditions',
        'termeni-conditii' => 'terms-and-conditions',
        'termsandconditions' => 'terms-and-conditions',
        'terms' => 'terms-and-conditions',

        'politicadeconfidentialitate' => 'privacy-policy',
        'privacypolicy' => 'privacy-policy',
    ];

    /**
     * Permanently redirect a legacy `.html` URL, defaulting to the homepage.
     */
    public function __invoke(string $path): RedirectResponse
    {
        $slug = Str::of($path)->afterLast('/')->lower()->beforeLast('.html')->toString();

        return redirect()->route(self::MAP[$slug] ?? 'home', status: 301);
    }
}
