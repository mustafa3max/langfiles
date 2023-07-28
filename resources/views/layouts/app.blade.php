<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" x-data="{ darkMode: localStorage.getItem('dark') === 'true', dir: '{{ Session::get('locale') == 'ar' ? 'rtl' : 'ltr' }}' }" x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{ 'dark': darkMode }" class="scroll-smooth" lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('../favicon.png') }}">

    <title>@yield('page-title') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('page-description')">
    <meta name="keywords" content="@yield('page-keywords')">
    <meta name="author" content="Mustafamax">

    @vite('resources/css/app.css')
    @livewireStyles

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body
    class="font-almarai bg-primary-light dark:bg-primary-dark text-primary-dark dark:text-primary-light no-scrollbar relative"
    x-init="isAlpine = false" x-data="{ isAlpine: true }">
    <div class="absolute top-0 left-0 right-0 z-10">
        <div style="min-height: 92vh">
            @component('components.nav-bar')
            @endcomponent

            <!-- Page Content -->
            <div class="p-2">
                <div class="flex flex-wrap">
                    <aside class="w-full md:w-3/12 lg:w-2/12 xl:w-3/12">
                        {{-- <x-ads.banner_v_r /> --}}
                    </aside>
                    <div class="w-full md:w-9/12 lg:w-8/12 xl:w-6/12">
                        {{-- <x-ads.banner_h /> --}}
                        {{ $slot }}
                    </div>
                    <aside class="w-full md:w-full lg:w-2/12 xl:w-3/12">
                        {{-- <x-ads.banner_v_l /> --}}
                    </aside>
                    </main>
                </div>
            </div>
        </div>
        <div style="height: 8vh">
            <x-copy-right />
        </div>
    </div>

    <div x-show="isAlpine" class="absolute top-0 left-0 right-0 z-10">
        <div class="h-screen w-screen flex items-center justify-center bg-primary-light dark:bg-primary-dark">
            <div class="grid items-center justify-center gap-4">
                <img src="{{ asset('assets/images/logo.svg') }}" class="h-24 w-24 mx-auto animate-pulse"
                    alt="Langfiles Logo" />
                <h1 class="text-2xl text-center"><span
                        class="block uppercase font-extrabold">langfiles</span>{{ __('seo.title_home') }}
                </h1>
            </div>
        </div>
    </div>

    @vite('resources/js/app.js')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    {{-- <script async src="https://securepubads.g.doubleclick.net/tag/js/gpt.js"></script> --}}

</body>

</html>
