<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="facebook-domain-verification" content="f7u1q4wpnkj6k9byzgho4xr9vddu4p" />

        @if (config('services.gtm.enabled') && config('services.gtm.id'))
            {{--
                Google Tag Manager is deliberately NOT loaded here. The container
                pulls in GA4 and the Meta pixel, so it may only run once the
                visitor accepts cookies. `resources/js/lib/gtm.ts` reads this id
                and injects the loader at that point. There is no noscript
                iframe for the same reason: it would fire without consent.
            --}}
            <meta name="gtm-id" content="{{ config('services.gtm.id') }}">
        @endif

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        {{-- Bound by App\View\Composers\SeoComposer, per route. --}}
        <title>{{ $seo['title'] }}</title>

        <meta name="description" content="{{ $seo['description'] }}">
        <link rel="canonical" href="{{ $seo['canonical'] }}">

        <meta property="og:site_name" content="Mindventure">
        <meta property="og:title" content="{{ $seo['title'] }}">
        <meta property="og:description" content="{{ $seo['description'] }}">
        <meta property="og:image" content="{{ url('/og-image.png') }}">
        <meta property="og:url" content="{{ $seo['canonical'] }}">
        <meta property="og:locale" content="{{ $seo['ogLocale'] }}">
        <meta property="og:type" content="website">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $seo['title'] }}">
        <meta name="twitter:description" content="{{ $seo['description'] }}">
        <meta name="twitter:image" content="{{ url('/og-image.png') }}">

        @fonts

        @vite(['resources/css/app.css', 'resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
        <x-inertia::head />
    </head>
    <body class="font-sans antialiased">
        <x-inertia::app />
    </body>
</html>
