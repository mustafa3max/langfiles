<footer class="grid w-full gap-4 bg-secondary-light px-4 pt-4 text-sm dark:bg-secondary-dark">
    <div class="container mx-auto p-2">
        <div class="flex w-full flex-wrap">
            {{-- Logo --}}
            <div class="grid items-center justify-center text-center md:max-w-[340px] md:justify-start md:text-start">
                <div class="flex w-fit items-center justify-center gap-4 rounded-full bg-primary-light p-2 dark:bg-primary-dark md:w-full md:justify-start"
                    title="{{ config('app.name') }}">
                    <img src="{{ asset('assets/images/logo.svg') }}" class="h-12 w-12" alt="Langfiles Logo" />

                    <span
                        class="hidden grow text-center text-4xl font-extrabold uppercase md:block">{{ config('app.name') }}</span>
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
                        <a class="hover:text-accent" href="/blog">blog</a>
                    </li>
                    <li class="block py-1">
                        <a class="hover:text-accent" href="https://github.com/mustafa3max/" target="_blank"
                            rel="nofollow">github</a>
                    </li>
                    <li class="block py-1">
                        <a class="hover:text-accent" href="https://facebook.com/Lnagfiles/" target="_blank"
                            rel="nofollow">facebook</a>
                    </li>
                </ul>

                {{-- Legal --}}
                <ul class="text-center md:text-start">
                    <li class="font-extrabold uppercase">
                        {{ __('me_str.legal') }}
                    </li>
                    <li class="block py-1">
                        <a class="hover:text-accent" href="/privacy-policy">{{ __('me_str.privacy_policy') }}</a>
                    </li>
                    <li class="block py-1">
                        <a class="hover:text-accent" href="/terms-of-service">{{ __('me_str.terms_of_use') }}</a>
                    </li>
                </ul>

                {{-- Help --}}
                <ul class="text-center md:text-start">
                    <li class="font-extrabold uppercase">
                        {{ __('me_str.help') }}
                    </li>
                    <li class="block py-1">
                        <a class="hover:text-accent" href="mailto:www.langfiles@gamil.com" target="_blank"
                            rel="nofollow">email</a>
                    </li>
                    <li class="block py-1">
                        <a class="hover:text-accent" href="http://m.me/Lnagfiles" target="_blank"
                            rel="nofollow">massenger</a>
                    </li>
                    <li class="block py-1">
                        <a class="hover:text-accent" href="https://wa.me/+9647707309366" target="_blank"
                            rel="nofollow">whatsapp</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mt-8 flex w-full flex-wrap items-center justify-center gap-4 border-t-2 border-primary-light pb-4 pt-8 text-center text-xs uppercase dark:border-primary-dark"
            dir="ltr">
            <span>
                &copy; {{ date('Y') }} <a href="/"
                    class="text-accent hover:underline">{{ config('app.name') }}</a>
            </span>
            <div class="hidden grow sm:block"></div>
            <span>
                from <a href="/mustafamax/profile" class="text-accent hover:underline">mustafamax</a>
            </span>
        </div>
    </div>

</footer>
