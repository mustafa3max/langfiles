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
    class="font-almarai bg-primary-light dark:bg-primary-dark text-primary-dark dark:text-primary-light no-scrollbar relative">
    <div class="h-screen relative bg-index-header bg-cover bg-center bg-accent" id="home">

        <div class="flex justify-center items-center h-full text-primary-light">
            <div class="backdrop-blur-md absolute top-0 bottom-0 left-0 right-0">
            </div>
            <div class="absolute top-0 bottom-0 left-0 right-0 bg-secondary-dark opacity-60">
            </div>
            <div class="z-10 p-2">
                <h1 class="text-center text-3xl ">LANGFILES
                    <br>
                    <br>
                    {{ __('index_str.title_index') }}
                </h1>
                <br>
                <br>
                <a href="types"
                    class="hover:underline block uppercase font-bold text-xl text-center animate-pulse">{{ __('me_str.show_files') }}</a>
            </div>
            <a href="#info" class="absolute bottom-0 p-2 animate-bounce shadow-sm"
                title="{{ __('me_str.go_info') }}"><i class="fa-solid fa-angles-down"></i></a>
        </div>
    </div>
    <div class="min-h-screen max-w-5xl mx-auto flex items-center justify-center relative" id="info">
        <div class="grid justify-center items-cente min-h-screen">
            <div class="grow"></div>
            <div class="grid max-sm:grid-cols-1 max-md:grid-cols-2 grid-cols-3 p-4 gap-4 h-full">
                <div class="bg-secondary-light dark:bg-secondary-dark p-4 rounded-lg text-center flex flex-col">
                    <h2 class="text-lg pb-2">{{ __('index_str.title_1') }}</h2>
                    <div class="border-t border-primary-light"></div>
                    <p class="text-sm py-2 grow">{{ __('index_str.description_1') }}</p>
                    <a href="types" class="text-accent">{{ __('me_str.show_files') }}</a>
                </div>
                <div class="bg-secondary-light dark:bg-secondary-dark p-4 rounded-lg text-center flex flex-col">
                    <h2 class="text-lg pb-2">{{ __('index_str.title_2') }}</h2>
                    <div class="border-t border-primary-light"></div>
                    <p class="text-sm py-2 grow">{{ __('index_str.description_2') }}</p>
                    <a href="https://ar.wikipedia.org/wiki/%D8%AC%D8%B3%D9%88%D9%86" class="text-accent" target="_blank"
                        rel="nofollow">{{ __('index_str.link_1') }}</a>
                </div>
                <div
                    class="bg-secondary-light dark:bg-secondary-dark p-4 rounded-lg text-center max-md:col-span-3 max-sm:col-span-1 flex flex-col">
                    <h2 class="text-lg pb-2">{{ __('index_str.title_3') }}</h2>
                    <div class="border-t border-primary-light"></div>
                    <p class="text-sm py-2 grow">{{ __('index_str.description_3') }}</p>
                    <a href="types" class="text-accent">{{ __('me_str.show_files') }}</a>
                </div>
            </div>
            <div class="grow h-16"></div>
        </div>
        <a href="#home" class="absolute bottom-0 p-2 animate-bounce text-accent"
            title="{{ __('me_str.go_home') }}"><i class="fa-solid fa-angles-up"></i></a>

    </div>
</body>

</html>
