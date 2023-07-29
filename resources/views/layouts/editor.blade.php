<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" x-data="{ darkMode: localStorage.getItem('dark') === 'true', dir: '{{ Session::get('locale') == 'ar' ? 'rtl' : 'ltr' }}' }" x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{ 'dark': darkMode }" class="scroll-smooth" lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('../favicon.png') }}">

    <title>@yield('page-title') - {{ config('app.name') }}</title>

    @vite('resources/css/app.css')
    @livewireStyles

    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" onload="this.onload=null;this.rel='stylesheet'"
        as="style" />
    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="font">
</head>

<body class="font-almarai bg-primary-light dark:bg-primary-dark text-primary-dark dark:text-primary-light no-scrollbar">

    <div class="p-4">
        {{ $slot }}
        <div class="h-1 rounded-full bg-accent my-2"></div>
        <x-card>
            <div class="overflow-hidden">
                <pre dir="ltr"><code id="bodyHtml"></code></pre>
            </div>
        </x-card>
        <div class="p-1"></div>
        <button class="block bg-secondary-dark p-4 rounded-lg hover:bg-accent" onclick="getHtml()">Get HTML</button>
    </div>
    @vite('resources/js/app.js')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/@alpinejs/collapse@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <script>
        function selectText(containerid) {
            if (document.selection) {
                var range = document.body.createTextRange();
                range.moveToElementText(document.getElementById(containerid));
                range.select();
            } else if (window.getSelection) {
                var range = document.createRange();
                range.selectNode(document.getElementById(containerid));
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(range);
            }
        }

        function getHtml() {
            const bodyText = document.getElementById('bodyText');
            const bodyHtml = document.getElementById('bodyHtml');

            bodyHtml.innerText = '<div>' + bodyText.innerHTML + '</div>';
            selectText('bodyHtml');
        }
    </script>
</body>

</html>
