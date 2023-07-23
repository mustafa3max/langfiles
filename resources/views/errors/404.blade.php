@extends('errors::layout')

@section('page-title')
    {{ __('seo.title_404') }}
@endsection
@section('page-description')
    {{ __('seo.description_404') }}
@endsection
@section('page-keywords')
    {{ __('seo.key_words_404') }}
@endsection

<div class="text-center grid gap-6 container items-center justify-center">
    <img src="{{ asset('assets/images/error_404.svg') }}" alt="404 {{ __('error.title_error_404') }}" onerror="error()"
        id="img404">
    <h1 class="mb-4 tracking-tight font-extrabold text-9xl text-accent dark:text-accent hidden" id="text404">404</h1>
    <p class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">{{ __('error.title_error_404') }}</p>
    <p class="mb-4 text-lg font-light text-gray-500 dark:text-gray-400">{{ __('error.desc_error_404') }}</p>

    <a href="/types">
        @component('components.raised-button', ['value' => __('me_str.home'), 'icon' => 'home'])
        @endcomponent
    </a>

    <script>
        const img404 = document.getElementById('img404');
        const text404 = document.getElementById('text404');

        function error() {
            img404.style.display = 'none';
            text404.style.display = 'block';
        }
    </script>
</div>
