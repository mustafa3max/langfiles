<a class="bg-secondary-light dark:bg-secondary-dark border border-transparent text-center rounded-lg {{ $countItems > 0 ? 'hover:border-accent dark:hover:border-accent' : '' }} shadow-md grid grid-rows-1"
    @if ($countItems > 0) href="{{ route($route, $dataRoute) }}" @endif>

    <span class="text-accent p-8 uppercase font-extrabold text-xl">{{ __('lang.' . $lang) }}</span>

    <p class="break-words text-lg grid items-center justify-center p-1">{{ $data }}</p>

    <div class="bg-primary-light dark:bg-primary-dark m-1 rounded-lg p-2 flex gap-2 items-center justify-center">
        <span class="">{{ $countItems }}</span>
        <span class="">{{ __('me_str.item') }}</span>
    </div>
</a>
