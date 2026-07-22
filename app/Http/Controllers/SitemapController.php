<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Date;

/**
 * Serves the XML sitemap so search engines can discover every page.
 *
 * The site is a single page application behind Inertia, so there is no crawlable
 * link path a search engine can rely on before the JavaScript bundle runs. The
 * sitemap lists the routes explicitly instead.
 */
class SitemapController extends Controller
{
    /**
     * Route name => [page component, change frequency, priority].
     *
     * @var array<string, array{string, string, string}>
     */
    private const PAGES = [
        'home' => ['Home', 'weekly', '1.0'],
        'ib-math' => ['IbMath', 'monthly', '0.9'],
        'ib-ia' => ['IbIa', 'monthly', '0.9'],
        'junior' => ['Junior', 'monthly', '0.9'],
        'about' => ['About', 'monthly', '0.7'],
        'contact' => ['Contact', 'monthly', '0.7'],
        'terms-and-conditions' => ['Terms', 'yearly', '0.2'],
        'privacy-policy' => ['Privacy', 'yearly', '0.2'],
    ];

    /**
     * Render the sitemap for every public page.
     */
    public function __invoke(): Response
    {
        $urls = collect(self::PAGES)
            ->map(fn (array $settings, string $name): string => sprintf(
                "    <url>\n        <loc>%s</loc>\n        <lastmod>%s</lastmod>\n        <changefreq>%s</changefreq>\n        <priority>%s</priority>\n    </url>",
                e(route($name)),
                $this->lastModified($settings[0]),
                $settings[1],
                $settings[2],
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

    /**
     * When the page itself last changed.
     *
     * Google ignores a `lastmod` it cannot trust, so this reports the component's
     * modification time rather than the time of the request.
     */
    private function lastModified(string $component): string
    {
        $path = resource_path("js/pages/{$component}.vue");
        $timestamp = is_file($path) ? filemtime($path) : false;

        return Date::createFromTimestamp($timestamp ?: 0)->toAtomString();
    }
}
