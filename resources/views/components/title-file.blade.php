<h1
    class="mb-2 flex flex-wrap items-center gap-2 rounded-lg bg-primary-light px-4 py-2 text-center font-bold dark:bg-primary-dark">
    @php
        if (LaravelLocalization::getCurrentLocaleDirection() == 'ltr') {
            $icon = 'right';
        } else {
            $icon = 'left';
        }

    @endphp
    <x-text-link href="/types?page={{ session()->get('urlTypes') }}">{{ __('me_str.types') }}</x-text-link>
    <i class="fa-solid fa-angle-{{ $icon }} py-2"></i>
    <span>{{ __('tables.' . $title) }}</span>
    <div class="grow"></div>
    <span class="py-2">{{ $count }} {{ __('me_str.item') }}</span>
</h1>
