@component('vendor.mail.html.layout')
    {{-- Header --}}
    @component('vendor.mail.html.header', ['url' => url('/')])
        {{ config('app.name') }}
    @endcomponent

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        @component('vendor.mail.html.subcopy')
            {{ $subcopy }}
        @endcomponent
    @endisset

    {{-- Footer --}}
    @component('vendor.mail.html.footer')
        &copy; {{ date('Y') }} <a href="{{ url('/') }}"
            class="uppercase text-accent hover:underline">{{ config('app.name') }}</a>,
        {{ __('me_str.copy_right_all') }}
    @endcomponent
@endcomponent
