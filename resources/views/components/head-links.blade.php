<div class="flex-wrap justify-start py-2">
    @php
        $isType = false;
        $isFile = false;
        if (Route::currentRouteName() == 'types') {
            $isType = false;
        } else {
            $isType = true;
        }
        if (Route::currentRouteName() == 'file') {
            $isFile = false;
        } else {
            $isFile = true;
        }
        
        if (LaravelLocalization::getCurrentLocaleDirection() == 'ltr') {
            $icon = 'right';
        } else {
            $icon = 'left';
        }
        
    @endphp
    @if ($isType)
        <a href="{{ $isType ? '/types' : '#' }}"
            class="text-accent py-2 pe-2 hover:underline">{{ __('me_str.types') }}</a>
    @else
        <a class="py-2 pe-2">{{ __('me_str.types') }}</a>
        <i class="fa-solid fa-angle-{{ $icon }} py-2 pe-2 text-transparent"></i>
    @endif
    @if (Route::currentRouteName() == 'file')
        <i class="fa-solid fa-angle-{{ $icon }} py-2 pe-2"></i>
        @if ($isFile)
            <a href="{{ $isFile ? route('/file', ['path' => session('path')]) : '#' }}"
                class="text-accent py-2 pe-2 hover:underline">{{ __('me_str.file') }}</a>
        @else
            <a class="py-2 pe-2">{{ __('me_str.file') }}</a>
        @endif
    @endif
</div>
