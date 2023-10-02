<h1
    class="mb-2 flex flex-wrap items-center gap-2 rounded-lg bg-primary-light px-4 py-2 text-center font-bold dark:bg-primary-dark">
    @php
        if (LaravelLocalization::getCurrentLocaleDirection() == 'ltr') {
            $icon = 'right';
        } else {
            $icon = 'left';
        }
        
    @endphp
    <a href="/types?page={{ session()->get('urlTypes') }}" class="py-2 text-accent hover:underline"
        wire:navigate>{{ __('me_str.types') }}</a>
    <i class="fa-solid fa-angle-{{ $icon }} py-2"></i>
    <span>{{ __('tables.' . $title) }}</span>
    <div class="grow"></div>
    <span class="py-2">{{ $count }} {{ __('me_str.item') }}</span>
</h1>
