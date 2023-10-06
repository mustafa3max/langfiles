<div>
    @section('page-title')
        {{ __('seo.title_mustafamax') }}
    @endsection

    @section('page-description')
        {{ __('seo.desc_mustafamax') }}
    @endsection
    <x-card>
        <div class="grid gap-4 md:flex">
            <div
                class="grid items-center justify-center gap-4 whitespace-nowrap rounded-lg bg-primary-light p-4 dark:bg-primary-dark">
                <img src="{{ asset('assets/images/mustafamax.png') }}" alt="mustafamax"
                    class="mx-auto h-24 w-24 rounded-full border-2 border-accent shadow-sm dark:border-accent"
                    title="mustafamax">
                <span class="text-center font-extrabold uppercase">mustafamax</span>

                <div class="grid gap-2">
                    <x-text-link href="https://www.facebook.com/mustafamax13"
                        isNavigate="1">{{ __('seo.profile_facebook_mustafamax') }}</x-text-link>
                    <x-text-link href="https://www.facebook.com/Lnagfiles/"
                        isNavigate="1">{{ __('seo.page_facebook_mustafamax') }}</x-text-link>
                    <span class="text-center">+96407707309366</span>
                </div>
            </div>


            <div class="grid gap-4">
                <div
                    class="grid grow items-center rounded-lg border-4 border-primary-light p-4 text-center dark:border-primary-dark md:text-start">
                    <h1 class="font-semibold uppercase">{{ __('seo.title_mustafamax') }}</h1>
                    <div class="my-2 border-b-4 border-primary-light dark:border-primary-dark"></div>
                    <p>{{ __('seo.desc_mustafamax') }}</p>
                </div>

                <div class="flex flex-wrap gap-2">
                    <a href="https://www.youtube.com/channel/UCLhPq6dfOYemkP_hmohPLug" target="_blank" rel="nofollow"
                        class="block h-fit w-fit grow rounded-lg bg-primary-light p-2 text-center hover:text-accent dark:bg-primary-dark">{{ __('seo.youtube_mustafamax') }}</a>
                    <a href="https://www.instagram.com/mustafa_3_max/" target="_blank" rel="nofollow"
                        class="block h-fit w-fit grow rounded-lg bg-primary-light p-2 text-center hover:text-accent dark:bg-primary-dark">{{ __('seo.instagram_mustafamax') }}</a>
                    <a href="https://www.tiktok.com/@mustafa__max" target="_blank" rel="nofollow"
                        class="block h-fit w-fit grow rounded-lg bg-primary-light p-2 text-center hover:text-accent dark:bg-primary-dark">{{ __('seo.tiktok_mustafamax') }}</a>
                </div>
            </div>
        </div>
    </x-card>
</div>
