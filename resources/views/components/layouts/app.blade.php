<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" x-data="{ darkMode: localStorage.getItem('dark') === 'true', dir: '{{ Session::get('locale') == 'ar' ? 'rtl' : 'ltr' }}' }"
    x-init="$watch('darkMode', val => localStorage.setItem('dark', val))" x-bind:class="{ 'dark': darkMode }" class="scroll-smooth"
    lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('../favicon.png') }}">

    <title>@yield('page-title') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('page-description')">
    <meta name="author" content="Mustafamax">

    <meta property="og:title" content="@yield('page-title')" />
    <meta property="og:description" content="@yield('page-description')" />
    <meta property="og:locale" content="{{ LaravelLocalization::getCurrentLocale() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:image" content="@yield('social-image', asset('assets/images/bg_image_home.webp'))" />
    <meta property="og:video:type" content="video/mp4." />
    <meta property="og:video" content="{{ asset('assets/videos/bg_video_home.mp4') }}" />
    <meta property="og:video:secure_url" content="{{ asset('assets/videos/langfiles_show.mp4') }}" />
    <meta property="og:video:width" content="720" />
    <meta property="og:video:height" content="576" />

    <meta name="robots" content="@yield('page-index')">

    <meta name="yandex-verification" content="58c686c180371774" />

    @vite('resources/css/app.css')
    @markdomStyles()
    <style>
        [x-cloak] {
            display: none !important;
        }

        input:-webkit-autofill {
            -webkit-text-fill-color: #666;
            font-weight: bold;
            caret-color: #666
        }
    </style>
    {{-- Start Font Almarai --}}
    <link rel="preconnect" as="style" href="https://fonts.googleapis.com">
    <link rel="preconnect" as="style" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">
    {{-- End Font Almarai --}}

    @stack('scripts-schema')
</head>

<body
    class="relative overflow-x-hidden bg-primary-light font-almarai text-primary-dark dark:bg-primary-dark dark:text-primary-light"
    x-cloak x-data="{
        isSelectTab: [],
        meCode: {},
        csvData: {},
        countMeCode: countCode(),
        lang: '{{ LaravelLocalization::getCurrentLocale() }}',
        isMeData: false,
        convert: JSON.parse(sessionStorage.getItem('convert')) ?? [true],
    }" x-init="meCode = JSON.parse(localStorage.getItem(lang + 'CodeAll')) ?? {},
        csvData = JSON.parse(localStorage.getItem('arCodeAll')) ?? {},
        isSelectTab = Object.keys(meCode).length > 0 ? [true, false] : []">
    <div class="absolute left-0 right-0 top-0 z-10">
        <div class="min-h-[65.5vh]">
            @component('components.nav-bar')
            @endcomponent
            <!-- Page Content -->
            <div class="container mx-auto p-2">
                <div class="flex flex-wrap">
                    <div class="w-full md:w-9/12">
                        <x-ads.banner_h />
                        <div x-show="!isMeData">{{ $slot }}</div>
                        <div x-show="isMeData" class="h-fit w-full"> <x-group-code /></div>
                    </div>
                    <aside class="w-full md:w-3/12">
                        <x-ads.banner_v />
                    </aside>
                </div>
            </div>
        </div>

        <x-footer />
        @include('cookie-consent::index')
    </div>

    @vite('resources/js/app.js')
    <script src="{{ asset('js/convert.js') }}"></script>
    <script src="https://unpkg.com/@victoryoalli/alpinejs-timeout@1.0.0/dist/timeout.min.js"></script>
    {{-- <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script> --}}
</body>

</html>
