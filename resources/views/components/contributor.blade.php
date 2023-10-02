<x-card>
    <div class="grid gap-2 md:flex">
        <div
            class="grid items-center justify-center gap-4 whitespace-nowrap rounded-lg bg-primary-light p-4 dark:bg-primary-dark">
            <img src="{{ asset('assets/images/mustafamax.png') }}" alt="mustafamax"
                class="mx-auto h-24 w-24 rounded-full border-2 border-accent shadow-sm dark:border-accent"
                title="mustafamax">
            <span class="text-center font-extrabold uppercase">{{ $name }}</span>

            <div class="grid gap-2">
                @if ($path_profile != null)
                    <a href="{{ $path_profile }}" target="_blank" rel="nofollow" class="text-center hover:text-accent"
                        wire:navigate>{{ __('seo.profile_facebook_mustafamax') }}</a>
                @endif

                @if ($website != null)
                    <a href="{{ $website }}" target="_blank" rel="nofollow"
                        class="text-center hover:text-accent">{{ __('seo.website_mustafamax') }}</a>
                @endif

                @if ($phone != null)
                    <span class="text-center">{{ $phone }}</span>
                @endif

            </div>
        </div>


        <div class="grid gap-2">
            <div
                class="grid grow items-center rounded-lg border-4 border-primary-light p-4 text-center dark:border-primary-dark md:text-start">
                <h1 class="font-semibold uppercase">{{ $title }}</h1>
                <div class="my-2 border-b-4 border-primary-light dark:border-primary-dark"></div>
                <p>{{ $desc }}</p>
            </div>

            <div class="flex flex-wrap items-stretch gap-2">
                @if ($path_1 != null)
                    <a href="{{ $path_1 }}" target="_blank" rel="nofollow"
                        class="flex w-fit grow items-center justify-center rounded-lg bg-primary-light p-2 text-center hover:text-accent dark:bg-primary-dark">{{ __('seo.youtube_mustafamax') }}</a>
                @endif

                @if ($path_2 != null)
                    <a href="{{ $path_2 }}" target="_blank" rel="nofollow"
                        class="flex w-fit grow items-center justify-center rounded-lg bg-primary-light p-2 text-center hover:text-accent dark:bg-primary-dark">{{ __('seo.instagram_mustafamax') }}</a>
                @endif

                @if ($path_3 != null)
                    <a href="{{ $path_3 }}" target="_blank" rel="nofollow"
                        class="flex w-fit grow items-center justify-center rounded-lg bg-primary-light p-2 text-center hover:text-accent dark:bg-primary-dark">{{ __('seo.tiktok_mustafamax') }}</a>
                @endif

            </div>
        </div>
    </div>
</x-card>
