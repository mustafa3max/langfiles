<!DOCTYPE html>
<html prefix="og: https://ogp.me/ns#" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}" x-data="{ id: location.hash == '' ? '#0' : location.hash, darkMode: localStorage.getItem('dark') === 'true', dir: '{{ Session::get('locale') == 'ar' ? 'rtl' : 'ltr' }}' }"
    x-init="$watch('darkMode', val => localStorage.setItem('dark', val))" x-bind:class="{ 'dark': darkMode }" class="scroll-smooth"
    lang="{{ LaravelLocalization::getCurrentLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.png') }}">
    <title>{{ __('seo.title_home') }} - {{ config('app.name') }}</title>
    <meta name="description" content="{{ __('seo.description_home') }}">
    <meta name="author" content="Mustafamax">

    <meta property="og:title" content="{{ __('seo.title_home') }} - {{ config('app.name') }}" />
    <meta property="og:locale" content="{{ LaravelLocalization::getCurrentLocale() }}" />
    <meta property="og:description" content="{{ __('seo.description_home') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ Request::url() }}" />
    <meta property="og:image" content="{{ asset('assets/images/bg_image_home.webp') }}" />

    @vite('resources/css/app.css')

    {{-- Start Font Almarai --}}
    <link rel="preconnect" as="style" href="https://fonts.googleapis.com">
    <link rel="preconnect" as="style" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300&display=swap" rel="stylesheet">
    {{-- End Font Almarai --}}
</head>

<body x-data="{ select: [true, false, false, false] }"
    class="bg-primary-light font-almarai text-primary-dark dark:bg-primary-dark dark:text-primary-light">

    <nav class="fixed top-0 z-50 flex w-full items-center justify-center drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">
        {{-- Nav Text --}}
        <div class="flex max-w-5xl flex-wrap items-center gap-4 max-md:hidden">
            <x-link-index id="0" index="0">{{ __('me_str.home') }}</x-link-index>
            <x-link-index id="1" index="1">{{ __('index_str.info1') }}</x-link-index>
            <x-link-index id="2" index="2">{{ __('index_str.info2') }}</x-link-index>
            <x-link-index id="3" index="3">{{ __('index_str.info3') }}</x-link-index>
        </div>

        {{-- Nav Icon --}}
        <div class="flex max-w-5xl flex-wrap items-center gap-4 md:hidden">
            <x-link-index-icon id="0" index="0" title="{{ __('me_str.home') }}" />
            <x-link-index-icon id="1" index="1" title="{{ __('index_str.info1') }}" />
            <x-link-index-icon id="2" index="2" title="{{ __('index_str.info2') }}" />
            <x-link-index-icon id="3" index="3" title="{{ __('index_str.info3') }}" />
        </div>
    </nav>

    {{-- Home --}}
    <div class="relative h-screen bg-accent bg-index-header bg-center" id="0">
        <video autoplay loop muted poster="{{ asset('assets/images/bg_image_home.webp') }}"
            class="absolute h-screen w-full object-cover max-lg:hidden">
            <source src="{{ asset('assets/videos/bg_video_home.mp4') }}" type="video/mp4">
        </video>
        <div
            class="flex h-full items-center justify-center text-primary-light drop-shadow-[0_1.2px_1.2px_rgba(0,0,0,0.8)]">
            <div class="absolute bottom-0 left-0 right-0 top-0 bg-primary-dark opacity-30">
            </div>
            <div class="z-10 p-2">
                <h1 class="text-center text-3xl font-extrabold">LANGFILES
                    <br>
                    <br>
                    {{ __('index_str.title_index') }}
                </h1>
                <br>
                <br>
                <a href="types"
                    class="block animate-pulse text-center text-xl font-bold uppercase hover:underline">{{ __('me_str.show_files') }}</a>
            </div>
            <a href="#1" class="absolute bottom-0 animate-bounce p-2 shadow-sm" title="{{ __('me_str.go_info') }}"
                x-on:click="select[0]=false;select[1]=true;select[2]=false;select[3]=false;"><x-svg.angles-down /></i></a>
        </div>

    </div>

    {{-- Screen 1 --}}
    <div class="min-h-screen" id="1">
        <div class="flex flex-wrap">
            {{-- Image --}}
            <div class="flex min-h-screen w-2/4 pb-16 pt-32 max-md:hidden">
                <div class="flex grow items-center justify-center">
                    <img src="{{ asset('assets/images/index_1.svg') }}" alt="{{ __('index_str.title_1') }}">
                </div>
                <div class="h-full w-0.5 bg-secondary-light dark:bg-secondary-dark"></div>
            </div>
            {{-- Info --}}
            <div class="flex min-h-screen w-2/4 items-center justify-center px-8 pb-16 pt-32 max-md:w-full">
                <div class="text-center md:text-start">
                    <h2 class="pb-4 text-2xl font-bold">{{ __('index_str.title_1') }}</h2>
                    <p class="text-xl leading-9">{{ __('index_str.description_1') }}</p>
                    <div class="pt-4">
                        <a href="types"
                            class="animate-pulse text-lg font-bold uppercase text-accent hover:underline">{{ __('me_str.show_files') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Screen 2 --}}
    <div class="min-h-screen" id="2">
        <div class="flex flex-wrap">
            {{-- Info --}}
            <div class="flex min-h-screen w-2/4 items-center justify-center px-8 pb-16 pt-32 max-md:w-full">
                <div class="text-center md:text-start">
                    <h2 class="pb-4 text-2xl font-bold">{{ __('index_str.title_2') }}</h2>
                    <p class="text-xl leading-9">{{ __('index_str.description_2') }}</p>
                    <div class="pt-4">
                        <a href="types"
                            class="animate-pulse text-lg font-bold uppercase text-accent hover:underline">{{ __('me_str.show_files') }}</a>
                    </div>
                </div>
            </div>
            {{-- Image --}}
            <div class="flex min-h-screen w-2/4 pb-16 pt-32 max-md:hidden">
                <div class="h-full w-0.5 bg-secondary-light dark:bg-secondary-dark"></div>
                <div class="flex grow items-center justify-center p-16">
                    <img src="{{ asset('assets/images/index_2.svg') }}" alt="{{ __('index_str.title_2') }}">
                </div>
            </div>
        </div>
    </div>

    {{-- Screen 3 --}}
    <div class="min-h-screen" id="3">
        <div class="flex flex-wrap">
            {{-- Image --}}
            <div class="flex min-h-screen w-2/4 pb-16 pt-32 max-md:hidden">
                <div class="flex grow items-center justify-center">
                    <img src="{{ asset('assets/images/index_3.svg') }}" alt="{{ __('index_str.title_3') }}">
                </div>
                <div class="h-full w-0.5 bg-secondary-light dark:bg-secondary-dark"></div>
            </div>
            {{-- Info --}}
            <div class="flex min-h-screen w-2/4 items-center justify-center px-8 pb-16 pt-32 max-md:w-full">
                <div class="text-center md:text-start">
                    <h2 class="pb-4 text-2xl font-bold">{{ __('index_str.title_3') }}</h2>
                    <p class="text-xl leading-9">{{ __('index_str.description_3') }}</p>
                    <div class="pt-4">
                        <a href="types"
                            class="animate-pulse text-lg font-bold uppercase text-accent hover:underline">{{ __('me_str.show_files') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/home.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
