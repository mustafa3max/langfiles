<h1
    class="px-4 py-2 text-center bg-primary-light dark:bg-primary-dark mb-2 rounded-lg font-bold flex flex-wrap items-center gap-2">
    @php
        if (LaravelLocalization::getCurrentLocaleDirection() == 'ltr') {
            $icon = 'right';
        } else {
            $icon = 'left';
        }
        
    @endphp
    <a href="/types?page={{ session()->get('urlTypes') }}"
        class="text-accent py-2 hover:underline">{{ __('me_str.types') }}</a>
    <i class="fa-solid fa-angle-{{ $icon }} py-2"></i>
    <span>{{ __('tables.' . $title) }}</span>
    <div class="grow"></div>
    <span class="py-2">{{ $count }} {{ __('me_str.item') }}</span>
</h1>
