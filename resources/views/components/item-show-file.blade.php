<a class="bg-primary-light dark:bg-primary-dark border border-transparent text-center rounded-lg {{ $countItems > 0 ? 'hover:border-accent dark:hover:border-accent' : '' }} shadow-md grid grid-rows-1 min-h-[180]"
    @if ($countItems > 0) href="{{ route($route, $dataRoute) }}" @endif>

    <span class="text-accent py-8 px-1 uppercase font-extrabold text-xl">{{ __('lang.' . $lang) }}</span>

    <p class="break-words text-lg grid items-center justify-center p-2">{{ $data }}</p>

    <div
        class="bg-secondary-light dark:bg-secondary-dark rounded-lg p-2 border-2 border-primary-light dark:border-primary-dark w-full">
        <span class="pe-1">{{ $countItems }}</span>
        <span class="">{{ __('me_str.item') }}</span>
    </div>
</a>
