<!DOCTYPE html>
<html dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" x-data="{ darkMode: localStorage.getItem('dark') === 'true', dir: '{{ Session::get('locale') == 'ar' ? 'rtl' : 'ltr' }}' }" x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{ 'dark': darkMode }" class="scroll-smooth" lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('../favicon.png') }}">
    <title>{{ __('seo.title_home') }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ __('seo.description_home') }}">
    <meta name="keywords" content="{{ __('seo.key_words_home') }}">
    <meta name="author" content="Mustafamax">

    @vite('resources/css/app.css')

    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" onload="this.onload=null;this.rel='stylesheet'"
        as="style" />

    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="preload" as="font">
</head>

<body
    class="no-scrollbar relative bg-primary-light font-almarai text-primary-dark dark:bg-primary-dark dark:text-primary-light">
    <div class="relative h-screen bg-accent bg-index-header bg-cover bg-center" id="home">
        <div class="flex h-full items-center justify-center text-primary-light">
            <div class="absolute bottom-0 left-0 right-0 top-0 backdrop-blur-md">
            </div>
            <div class="absolute bottom-0 left-0 right-0 top-0 bg-secondary-dark opacity-60">
            </div>
            <div class="z-10 p-2">
                <h1 class="text-center text-3xl">LANGFILES
                    <br>
                    <br>
                    {{ __('index_str.title_index') }}
                </h1>
                <br>
                <br>
                <a href="types"
                    class="block animate-pulse text-center text-xl font-bold uppercase hover:underline">{{ __('me_str.show_files') }}</a>
            </div>
            <a href="#info" class="absolute bottom-0 animate-bounce p-2 shadow-sm"
                title="{{ __('me_str.go_info') }}"><i class="fa-solid fa-angles-down"></i></a>
        </div>
    </div>
    <div class="mx-auto flex min-h-screen max-w-5xl items-center justify-center" id="info">
        <div class="items-cente grid min-h-screen justify-center">
            <div class="grow"></div>
            <div class="grid h-fit grid-cols-3 gap-4 p-4 max-md:grid-cols-2 max-sm:grid-cols-1">
                <div class="flex flex-col rounded-lg bg-secondary-light p-4 text-center dark:bg-secondary-dark">
                    <h2 class="pb-2 text-lg font-bold">{{ __('index_str.title_1') }}</h2>
                    <div class="border-t border-primary-light"></div>
                    <p class="grow py-2">{{ __('index_str.description_1') }}</p>
                    <a href="types" class="text-accent">{{ __('me_str.show_files') }}</a>
                </div>
                <div class="flex flex-col rounded-lg bg-secondary-light p-4 text-center dark:bg-secondary-dark">
                    <h2 class="pb-2 text-lg font-bold">{{ __('index_str.title_2') }}</h2>
                    <div class="border-t border-primary-light"></div>
                    <p class="grow py-2">{{ __('index_str.description_2') }}</p>
                    <a href="types" class="text-accent">{{ __('me_str.show_files') }}</a>
                </div>
                <div class="flex flex-col rounded-lg bg-secondary-light p-4 text-center dark:bg-secondary-dark">
                    <h2 class="pb-2 text-lg font-bold">{{ __('index_str.title_3') }}</h2>
                    <div class="border-t border-primary-light"></div>
                    <p class="grow py-2">{{ __('index_str.description_3') }}</p>
                    <a href="types" class="text-accent">{{ __('me_str.show_files') }}</a>
                </div>
            </div>
        </div>
    </div>
    @vite('resources/js/app.js')
</body>

</html>
