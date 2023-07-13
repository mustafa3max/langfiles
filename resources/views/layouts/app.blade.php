<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" x-data="{ darkMode: localStorage.getItem('dark') === 'true', dir: '{{ Session::get('locale') == 'ar' ? 'rtl' : 'ltr' }}' }" x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('../favicon.png') }}">

    <title>@yield('page-title') - {{ config('app.name') }}</title>
    <meta name="description" content="@yield('page-description')">
    <meta name="keywords" content="@yield('page-keywords')">
    <meta name="author" content="Mustafamax">

    @livewireStyles
    @vite(['resources/css/app.css'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('stayles')
</head>

<body class="font-almarai">
    <div class="bg-primary-light dark:bg-primary-dark text-primary-dark dark:text-primary-light no-scrollbar">
        <div style="min-height: 92vh">
            @component('components.nav-bar')
            @endcomponent

            <!-- Page Content -->
            <div class="p-2">
                <div class="flex flex-wrap">
                    <aside class="w-full md:w-3/12 lg:w-2/12 xl:w-3/12">
                    </aside>
                    <div class="w-full md:w-9/12 lg:w-8/12 xl:w-6/12">
                        {{ $slot }}
                    </div>
                    <aside class="w-full md:w-full lg:w-2/12 xl:w-3/12">
                    </aside>
                    </main>
                </div>
            </div>
        </div>
        <div style="height: 8vh">
            <x-copy-right />
        </div>

        @livewireScripts
        @stack('scripts')
        @vite(['resources/js/app.js'])

</body>

</html>
