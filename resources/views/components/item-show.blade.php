<a class="{{ $countItems > 0 ? 'hover:border-accent dark:hover:border-accent' : '' }} relative grid min-h-[180] grid-rows-1 rounded-lg border border-transparent bg-secondary-light text-center shadow-md dark:bg-secondary-dark"
    @if ($countItems > 0) href="{{ $route }}" @endif>

    <div class="absolute flex items-center justify-center gap-1 p-2 text-sm"
        title="{{ __('me_str.more_lang', ['NUM' => $moreLang]) }}">
        <span>{{ $moreLang }}</span><i class="fa-solid fa-language"></i>
    </div>

    <div class="grid gap-1 px-1 py-8 text-xl font-extrabold uppercase">
        <span class="text-accent">{{ $countItems }}</span>
        <span>{{ __('me_str.item') }}</span>
    </div>

    <p
        class="break-words rounded-lg border-2 border-secondary-light bg-primary-light p-2 text-lg dark:border-secondary-dark dark:bg-primary-dark">
        {{ $data }}
    </p>
</a>
