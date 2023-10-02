<a class="{{ $countItems > 0 ? 'hover:border-accent dark:hover:border-accent' : '' }} grid min-h-[180] grid-rows-1 rounded-lg border border-transparent bg-primary-light text-center shadow-md dark:bg-primary-dark"
    @if ($countItems > 0) href="{{ $route }}" wire:navigate @endif>

    <div class="grid gap-1 px-1 py-8 text-xl uppercase">
        <span class="font-semibold text-accent">{{ $countItems }}</span>
        <span>{{ __('me_str.item') }}</span>
    </div>
    <span
        class="flex items-center justify-center gap-2 break-words rounded-lg border-2 border-primary-light bg-secondary-light p-4 text-lg font-semibold dark:border-primary-dark dark:bg-secondary-dark">
        {{ $data }}
        <div class="flex items-center justify-center gap-1 opacity-80"
            title="{{ __('me_str.more_lang', ['NUM' => $moreLang]) }}">
            <span>{{ $moreLang }}</span><i class="fa-solid fa-language"></i>
        </div>
    </span>
</a>
