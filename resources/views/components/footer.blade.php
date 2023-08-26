<footer class="grid w-full gap-4 bg-secondary-light px-4 pt-4 text-sm dark:bg-secondary-dark">
    <div class="mx-auto w-full md:w-full lg:w-8/12 xl:w-6/12">
        <div class="flex w-full flex-wrap">
            {{-- Logo --}}
            <div class="grid items-center justify-start text-center md:max-w-[340px] md:text-start">
                <div class="flex items-center justify-center gap-2 md:justify-start" title="{{ config('app.name') }}">
                    <img src="{{ asset('assets/images/logo.svg') }}" class="h-12 w-12" alt="Langfiles Logo" />
                    <span class="hidden text-3xl font-extrabold uppercase md:block">{{ config('app.name') }}</span>
                </div>
                <h2 class="py-4 text-xl font-bold">{{ __('seo.title_home') }}</h2>
                <p>{{ __('seo.description_home') }}</p>

                <div class="m-8 border-t md:hidden"></div>

            </div>

            <div class="md:grow"></div>

            <div class="flex w-full flex-wrap justify-center gap-16 md:w-fit">
                {{-- Community --}}
                <table class="">
                    <caption class="text-start font-extrabold uppercase">
                        {{ __('me_str.community') }}
                    </caption>
                    <tr class="block py-1">
                        <td><a class="hover:text-accent" href="/blog">blog</a></td>
                    </tr>
                    <tr class="block py-1">
                        <td><a class="hover:text-accent" href="http://" target="_blank" rel="nofollow">github</a></td>
                    </tr>
                    <tr class="block py-1">
                        <td><a class="hover:text-accent" href="http://" target="_blank" rel="nofollow">facebook</a></td>
                    </tr>
                </table>

                {{-- Help --}}
                <table class="">
                    <caption class="text-start font-extrabold uppercase">
                        {{ __('me_str.help') }}
                    </caption>
                    <tr class="block py-1">
                        <td><a class="hover:text-accent" href="mailto:langfiles@gamil.com" target="_blank"
                                rel="nofollow">email</a></td>
                    </tr>
                    <tr class="block py-1">
                        <td><a class="hover:text-accent" href="http://" target="_blank" rel="nofollow">massenger</a>
                        </td>
                    </tr>
                    <tr class="block py-1">
                        <td><a class="hover:text-accent" href="http://" target="_blank" rel="nofollow">telegram</a></td>
                    </tr>
                </table>

                {{-- Legal --}}
                <table class="">
                    <caption class="text-start font-extrabold uppercase">
                        {{ __('me_str.legal') }}
                    </caption>
                    <tr class="block py-1">
                        <td><a class="hover:text-accent" href="/privacy-policy">{{ __('me_str.privacy_policy') }}</a>
                        </td>
                    </tr>
                    <tr class="block py-1">
                        <td><a class="hover:text-accent" href="/terms-of-service">{{ __('me_str.terms_of_use') }}</a>
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
    <div class="w-full border-t-2 border-primary-light py-8 text-center dark:border-primary-dark">
        &copy; {{ date('Y') }} <a href="/mustafamax/profile" class="text-accent hover:underline">MUSTAFAMAX</a>,
        {{ __('me_str.copy_right_all') }} </div>
</footer>
