<footer class="grid w-full gap-4 bg-secondary-light px-4 pt-4 text-sm dark:bg-secondary-dark">
    <div class="container mx-auto p-2">
        <div class="flex w-full flex-wrap">
            {{-- Logo --}}
            <div class="grid items-center justify-center text-center md:max-w-[340px] md:justify-start md:text-start">
                <div class="flex w-full items-center justify-between gap-4 rounded-full bg-primary-light py-2 pe-4 ps-2 dark:bg-primary-dark"
                    title="{{ config('app.name') }}">
                    <img src="{{ asset('assets/images/logo.svg') }}" class="h-12 w-12" alt="Langfiles Logo" />

                    <span class="block text-center text-4xl font-extrabold uppercase">{{ config('app.name') }}</span>
                </div>
                <h2 class="py-4 text-xl font-bold">{{ __('seo.title_home') }}</h2>
                <p>{{ __('seo.description_home') }}</p>

                <div class="m-8 border-t md:hidden"></div>
            </div>

            <div class="md:grow"></div>

            <div class="flex w-full flex-wrap justify-center gap-16 md:w-fit">
                {{-- Community --}}
                <ul class="text-center md:text-start">
                    <li class="font-extrabold uppercase">
                        {{ __('me_str.community') }}
                    </li>
                    <li class="block py-1">
                        <x-text-link href="/ar/blog" isExternal="1" accent="0">Blog</x-text-link>
                    </li>
                    <li class="block py-1">
                        <x-text-link href="https://github.com/mustafa3max/" isExternal="1"
                            accent="0">Github</x-text-link>
                    </li>
                    <li class="block py-1">
                        <x-text-link href="https://facebook.com/Lnagfiles/" isExternal="1"
                            accent="0">Facebook</x-text-link>
                    </li>
                </ul>

                {{-- Legal --}}
                <ul class="text-center md:text-start">
                    <li class="font-extrabold uppercase">
                        {{ __('me_str.legal') }}
                    </li>
                    <li class="block py-1">
                        <x-text-link href="/en/privacy-policy" isExternal="1"
                            accent="0">{{ __('me_str.privacy_policy') }}</x-text-link>
                    </li>
                    <li class="block py-1">
                        <x-text-link href="/en/terms-of-service" isExternal="1"
                            accent="0">{{ __('me_str.terms_of_use') }}</x-text-link>
                    </li>
                </ul>

                {{-- Help --}}
                <ul class="text-center md:text-start">
                    <li class="font-extrabold uppercase">
                        {{ __('me_str.help') }}
                    </li>
                    <li class="block py-1">
                        <x-text-link href="/call-us" accent="0">{{ __('me_str.call_us') }}</x-text-link>
                    </li>
                    <li class="block py-1">
                        <x-text-link href="mailto:www.langfiles@gamil.com" isExternal="1"
                            accent="0">Email</x-text-link>
                    </li>
                    <li class="block py-1">
                        <x-text-link href="http://m.me/Lnagfiles" isExternal="1" accent="0">Massenger</x-text-link>
                    </li>
                    <li class="block py-1">
                        <x-text-link href="https://wa.me/+9647707309366" isExternal="1"
                            accent="0">Whatsapp</x-text-link>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mt-8 flex w-full flex-wrap items-center justify-center gap-4 border-t-2 border-primary-light pb-4 pt-8 text-center text-xs uppercase dark:border-primary-dark"
            dir="ltr">
            <span>
                &copy; {{ date('Y') }}
                <x-text-link href="/">{{ config('app.name') }}</x-text-link>
            </span>
            <div class="hidden grow sm:block"></div>
            <span>
                from
                <x-text-link href="/mustafamax/profile">mustafamax</x-text-link>
            </span>
        </div>
    </div>

</footer>
