<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

/**
 * Serves the XML sitemap so search engines can discover every page.
 *
 * The site is a single page application behind Inertia, so there is no crawlable
 * link path a search engine can rely on before the JavaScript bundle runs. The
 * sitemap lists the routes explicitly instead.
 *
 * There is deliberately no `<lastmod>`: the page copy lives in the language files
 * rather than in the components, and a deploy rewrites every file's modification
 * time, so nothing on disk tells us when a page actually changed. Google ignores
 * a `lastmod` it cannot trust, and the element is optional.
 */
class SitemapController extends Controller
{
    /**
     * Route name => [change frequency, priority].
     *
     * @var array<string, array{string, string}>
     */
    private const PAGES = [
        'home' => ['weekly', '1.0'],
        'ib-math' => ['monthly', '0.9'],
        'ib-ia' => ['monthly', '0.9'],
        'junior' => ['monthly', '0.9'],
        'about' => ['monthly', '0.7'],
        'contact' => ['monthly', '0.7'],
        'terms-and-conditions' => ['yearly', '0.2'],
        'privacy-policy' => ['yearly', '0.2'],
    ];

    /**
     * Render the sitemap for every public page.
     */
    public function __invoke(): Response
    {
        $urls = collect(self::PAGES)
            ->map(fn (array $settings, string $name): string => sprintf(
                "    <url>\n        <loc>%s</loc>\n        <changefreq>%s</changefreq>\n        <priority>%s</priority>\n    </url>",
                e(route($name)),
                $settings[0],
                $settings[1],
            ))
            ->implode("\n");

        $xml = <<<XML
            <?xml version="1.0" encoding="UTF-8"?>
            <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
            {$urls}
            </urlset>

            XML;

        return response($xml, 200, ['Content-Type' => 'application/xml']);
    }
}
