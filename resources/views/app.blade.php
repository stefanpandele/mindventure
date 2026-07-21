<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth" @class(['dark' => ($appearance ?? 'system') == 'dark'])>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="facebook-domain-verification" content="f7u1q4wpnkj6k9byzgho4xr9vddu4p" />

        @if (config('services.gtm.enabled') && config('services.gtm.id'))
            {{-- Google Tag Manager --}}
            <script>
                (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
                })(window,document,'script','dataLayer','{{ config('services.gtm.id') }}');
            </script>
            {{-- End Google Tag Manager --}}
        @endif

        <link rel="icon" href="/favicon.ico" sizes="any">
        <link rel="icon" href="/favicon.svg" type="image/svg+xml">
        <link rel="apple-touch-icon" href="/apple-touch-icon.png">

        <title>{{ config('app.name', 'Mindventure') }}</title>

        <meta name="description" content="Premium mathematics education for International Baccalaureate students.">

        <meta property="og:title" content="Mindventure">
        <meta property="og:description" content="Premium mathematics education for International Baccalaureate students.">
        <meta property="og:image" content="{{ url('/og-image.png') }}">
        <meta property="og:url" content="{{ config('app.url') }}">
        <meta property="og:type" content="website">

        @fonts

        @vite(['resources/css/app.css', 'resources/js/app.ts', "resources/js/pages/{$page['component']}.vue"])
        <x-inertia::head />
    </head>
    <body class="font-sans antialiased">
        @if (config('services.gtm.enabled') && config('services.gtm.id'))
            {{-- Google Tag Manager (noscript) --}}
            <noscript>
                <iframe
                    src="https://www.googletagmanager.com/ns.html?id={{ config('services.gtm.id') }}"
                    height="0"
                    width="0"
                    style="display:none;visibility:hidden"
                ></iframe>
            </noscript>
            {{-- End Google Tag Manager (noscript) --}}
        @endif
        <x-inertia::app />
    </body>
</html>
