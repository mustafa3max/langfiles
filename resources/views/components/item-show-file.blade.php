<a class="bg-primary-light dark:bg-primary-dark border border-transparent text-center rounded-lg {{ $countItems > 0 ? 'hover:border-accent dark:hover:border-accent' : '' }} shadow-md grid grid-rows-1 min-h-[180]"
    @if ($countItems > 0) href="{{ $route }}" @endif>

    <div class="py-8 px-1 uppercase font-extrabold text-xl grid gap-1">
        <span class="text-accent ">{{ $countItems }}</span>
        <span>{{ __('me_str.item') }}</span>
    </div>

    <p
        class="bg-secondary-light dark:bg-secondary-dark rounded-lg p-2 border-2 border-primary-light dark:border-primary-dark break-words text-lg">
        {{ $data }}
    </p>
</a>
