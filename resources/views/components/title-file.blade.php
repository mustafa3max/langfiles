<h1
    class="p-2 text-center bg-secondary-light dark:bg-secondary-dark mb-2 rounded-lg text-xl font-bold flex items-center gap-2">
    @php
        if (LaravelLocalization::getCurrentLocaleDirection() == 'ltr') {
            $icon = 'right';
        } else {
            $icon = 'left';
        }
        
    @endphp
    <a href="javascript:history.back()" class="text-accent py-2 pe-1 hover:underline">{{ __('me_str.types') }}</a>
    <i class="fa-solid fa-angle-{{ $icon }} py-2 pe-1"></i>
    <span>{{ __('tables.' . $title) }}</span>
    <span>{{ __('lang.' . $lang) }}</span>
</h1>
