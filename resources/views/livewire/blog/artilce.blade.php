<div>
    @section('page-title')
        {{ $article->title }}
    @endsection
    @section('page-description')
        {{ __('seo.description_file') }}
    @endsection
    @section('page-keywords')
        {{ __('seo.key_words_file') }}
    @endsection

    <x-card>
        <div class="grid items-center justify-center">
            <div dir="rtl">
                <h1 class="text-xl bg-primary-light dark:bg-primary-dark p-4 rounded-t-lg">{{ $article->title }}</h1>
                <p class="border-4 border-primary-light dark:border-primary-dark p-4 rounded-b-lg">
                    {{ $article->article }}
                </p>
            </div>
            <div class="pt-2 flex flex-wrap gap-2 items-center justify-center">
                <div class="flex gap-2 bg-primary-light dark:bg-primary-dark rounded-lg p-2 items-center">
                    <span>{{ __('me_str.author') }}</span>
                    <i class="fa-solid fa-list"></i>
                    <a href="/mustafamax/profile">
                        @component('components.text-button', ['value' => $article->author])
                        @endcomponent
                    </a>
                </div>
                {{-- <div class="flex gap-2 bg-primary-light dark:bg-primary-dark rounded-lg p-2 items-center">
                <span>{{ __('me_str.comments') }}</span>
                <i class="fa-solid fa-list"></i>
                @component('components.text-button', ['value' => 45])
                @endcomponent
            </div> --}}
            </div>
        </div>
    </x-card>
</div>
