<div class="z-20 grid gap-4 rounded-lg border border-primary-light bg-secondary-light p-4 shadow-lg dark:border-primary-dark dark:bg-secondary-dark"
    x-show="isMenu" x-on:click.outside="isMenu = false" x-transition.duration.500ms>
    @if (Auth::check())
        <a href="/user/profile" class="flex items-center gap-4">
            <x-svg.user />
            <span>{{ __('me_str.profile') }}</span>
        </a>

        <a href="/user/logout" class="flex items-center gap-4">
            <x-svg.logout />
            <span>{{ __('me_str.logout') }}</span>
        </a>
    @else
        <a href="/register" class="flex items-center gap-4">
            <x-svg.register />
            <span>{{ __('seo.title_register') }}</span>
        </a>
        <a href="/login" class="flex items-center gap-4">
            <x-svg.logout />
            <span>{{ __('seo.title_login') }}</span>
        </a>
    @endif

    <ul class="grid gap-4 border-y border-primary-light py-4 dark:border-primary-dark">
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if (LaravelLocalization::getCurrentLocale() != $localeCode)
                <li>
                    <a rel="alternate" hreflang="{{ $localeCode }}" class="flex items-center gap-4"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <x-svg.lang />
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>

    <a href="/privacy-policy" class="flex items-center gap-4">
        <x-svg.privacy />
        <span>
            {{ __('me_str.policy_and_terms') }}
        </span>
    </a>

    <div class="border-b border-primary-light dark:border-primary-dark"></div>
    <a href="/call-us" class="flex items-center gap-4">
        <x-svg.call />
        <span>{{ __('me_str.call_us') }}</span>
    </a>
</div>
