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

<div class="container grid items-center justify-center gap-6 text-center">
    <img src="{{ asset('assets/images/error_404.svg') }}" alt="404 {{ __('error.title_error_404') }}" onerror="error()"
        id="img404">
    <h1 class="mb-4 hidden text-9xl font-extrabold tracking-tight text-accent dark:text-accent" id="text404">404</h1>
    <p class="text-gray-900 dark:text-white mb-4 text-4xl font-bold tracking-tight">{{ __('error.title_error_404') }}</p>
    <p class="text-gray-500 dark:text-gray-400 mb-4 text-lg font-light">{{ __('error.desc_error_404') }}</p>

    <div class="flex justify-center">
        <a href="/types" class="w-fit">
            <x-fill-btn>{{ __('me_str.home') }}</x-fill-btn>
        </a>
    </div>

    <script>
        const img404 = document.getElementById('img404');
        const text404 = document.getElementById('text404');

        function error() {
            img404.style.display = 'none';
            text404.style.display = 'block';
        }
    </script>
</div>
