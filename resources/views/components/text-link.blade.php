<a href="{{ $href ?? '#' }}"
    @if ($accent ?? 1) class="font-extrabold text-accent hover:underline" @else class="font-extrabold text-primary-dark dark:text-primary-light hover:underline" @endif
    @if ($isNavigate ?? false) wire:navigate @endif
    @if ($isExternal ?? false) target="_blank" rel="nofollow" @endif>{{ $slot }}</a>
