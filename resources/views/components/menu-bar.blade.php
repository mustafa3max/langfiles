<div class="z-20 grid gap-4 rounded-lg border border-primary-light bg-secondary-light p-4 shadow-lg dark:border-primary-dark dark:bg-secondary-dark"
    x-show="isMenu" x-on:click.outside="isMenu = false" x-transition.duration.500ms>
    @if (Auth::check())
        <a href="/user/profile" class="flex items-center gap-4">
            <i class="fa-solid fa-user"></i>
            <span>{{ __('me_str.profile') }}</span>
        </a>
    @endif

    <a href="#" class="flex items-center gap-4" x-cloak x-on:click="darkMode = !darkMode;">
        <i x-show="!darkMode" class="fa-solid fa-moon"></i>
        <i x-show="darkMode" class="fa-solid fa-sun"></i>
        <span x-show="!darkMode">
            {{ __('me_str.dark_appearance') }}
        </span>
        <span x-show="darkMode">
            {{ __('me_str.light_appearance') }}
        </span>
    </a>

    <ul class="grid gap-4 border-t border-primary-light pt-4 dark:border-primary-dark">
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            @if (LaravelLocalization::getCurrentLocale() != $localeCode)
                <li>
                    <a rel="alternate" hreflang="{{ $localeCode }}" class="flex items-center gap-4"
                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <i class="fa-solid fa-earth-{{ $localeCode == 'en' ? 'americas' : 'asia' }}"></i>
                        {{ $properties['native'] }}
                    </a>
                </li>
            @endif
        @endforeach
    </ul>
</div>
