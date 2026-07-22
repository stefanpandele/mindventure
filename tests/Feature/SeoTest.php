<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Date;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class SeoTest extends TestCase
{
    public function test_every_page_renders_its_own_title_and_description(): void
    {
        $response = $this->get(route('ib-math'));

        $response->assertOk();
        $response->assertSee('<title>Pregătire IB Math în grupe de maximum 4 elevi | Mindventure</title>', false);
        $response->assertSee('name="description" content="Pregătire pentru examenul IB Math', false);
        $response->assertSee('rel="canonical" href="'.route('ib-math').'"', false);
    }

    public function test_titles_are_unique_across_pages(): void
    {
        $titles = collect([
            'home', 'about', 'ib-math', 'ib-ia', 'junior',
            'contact', 'terms-and-conditions', 'privacy-policy',
        ])->map(function (string $name): string {
            preg_match('/<title>(.*?)<\/title>/', $this->get(route($name))->getContent() ?: '', $matches);

            return $matches[1] ?? '';
        });

        $this->assertCount(8, $titles->unique(), 'Each page must expose a distinct <title>.');
        $this->assertEmpty($titles->filter(fn (string $title): bool => $title === ''));
    }

    public function test_meta_tags_follow_the_selected_locale(): void
    {
        $this->withSession(['locale' => 'en']);

        $this->get(route('junior'))
            ->assertSee('<title>Mathematics for primary and secondary school | Mindventure</title>', false)
            ->assertSee('property="og:locale" content="en_US"', false);
    }

    /**
     * Every page of the previous static site, taken from its own source tree.
     *
     * @return array<string, array{string, string}>
     */
    public static function legacyUrlProvider(): array
    {
        return [
            'RO homepage' => ['/index.html', 'home'],
            'EN homepage' => ['/index-en.html', 'home'],
            'RO why Mindventure' => ['/despre.html', 'about'],
            'EN why Mindventure' => ['/about.html', 'about'],
            'RO method' => ['/metoda.html', 'home'],
            'EN method' => ['/method.html', 'home'],
            'RO founder story' => ['/povestea.html', 'about'],
            'EN founder story' => ['/story.html', 'about'],
            'RO programmes' => ['/programe.html', 'junior'],
            'EN programmes' => ['/programs.html', 'junior'],
            'RO terms' => ['/termenisiconditii.html', 'terms-and-conditions'],
            'EN terms' => ['/termsandconditions.html', 'terms-and-conditions'],
            'RO privacy' => ['/politicadeconfidentialitate.html', 'privacy-policy'],
            'EN privacy' => ['/privacypolicy.html', 'privacy-policy'],
            'navigation link that never had a file' => ['/generic.html', 'home'],
            'terms link that never had a file' => ['/terms.html', 'terms-and-conditions'],
        ];
    }

    #[DataProvider('legacyUrlProvider')]
    public function test_legacy_html_urls_redirect_permanently(string $legacy, string $target): void
    {
        $this->get($legacy)
            ->assertStatus(301)
            ->assertRedirect(route($target));
    }

    public function test_legacy_urls_are_matched_case_insensitively(): void
    {
        $this->get('/Index-EN.html')->assertRedirect(route('home'))->assertStatus(301);
        $this->get('/PROGRAME.HTML')->assertRedirect(route('junior'))->assertStatus(301);
    }

    public function test_unknown_legacy_html_urls_fall_back_to_the_homepage(): void
    {
        $this->get('/some/forgotten-page.html')
            ->assertRedirect(route('home'))
            ->assertStatus(301);
    }

    public function test_the_legacy_catch_all_does_not_shadow_real_routes(): void
    {
        $this->get(route('contact'))->assertOk();
        $this->get('/no-such-page')->assertNotFound();
    }

    public function test_sitemap_lists_every_public_page(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertOk();
        $response->assertHeader('Content-Type', 'application/xml');

        foreach (['home', 'about', 'ib-math', 'ib-ia', 'junior', 'contact', 'terms-and-conditions', 'privacy-policy'] as $name) {
            $response->assertSee('<loc>'.route($name).'</loc>', false);
        }

        $this->assertNotFalse(simplexml_load_string($response->getContent() ?: ''));
    }

    public function test_sitemap_reports_the_page_modification_time_not_the_request_time(): void
    {
        $expected = Date::createFromTimestamp(filemtime(resource_path('js/pages/Home.vue')))->toAtomString();

        $this->get('/sitemap.xml')->assertSee('<lastmod>'.$expected.'</lastmod>', false);
    }
}
