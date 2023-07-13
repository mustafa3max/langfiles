<div class="bg-secondary-light dark:bg-secondary-dark p-4 rounded-lg border border-primary-light dark:border-primary-dark shadow-lg z-20 grid gap-4"
    x-show="isMenu" x-on:click.outside="isMenu = false" x-transition.duration.500ms>
    @if (Auth::check())
        <a href="/user/profile" class="flex gap-4 items-center">
            <i class="fa-solid fa-user"></i>
            <span>{{ __('me_str.profile') }}</span>
        </a>
    @endif

    <a href="#" class="flex gap-4 items-center" x-cloak x-on:click="darkMode = !darkMode;">
        <i x-show="!darkMode" class="fa-solid fa-moon"></i>
        <i x-show="darkMode" class="fa-solid fa-sun"></i>
        <span x-show="!darkMode">
            {{ __('me_str.dark_appearance') }}
        </span>
        <span x-show="darkMode">
            {{ __('me_str.light_appearance') }}
        </span>
    </a>

    <ul class="grid gap-4 border-t border-primary-light dark:border-primary-dark pt-4">
        @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
            <li>
                <a rel="alternate" hreflang="{{ $localeCode }}" class="flex gap-4 items-center"
                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                    <i class="fa-solid fa-earth-{{ $localeCode == 'en' ? 'americas' : 'asia' }}"></i>
                    {{ $properties['native'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
