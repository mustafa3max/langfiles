@php
    $title = str_replace(' ', '_', $article->title);
@endphp
<a href="blog/article/{{ $article->id }}/{{ $title }}" title="{{ __('me_str.read_more') }}">
    <div class="grid items-center justify-center bg-secondary-light dark:bg-secondary-dark rounded-lg p-2">
        <div dir="rtl">
            <x-editor.img src="{{ asset($article->image) }}" alt="{{ $article->title }}" />
            <h2 class="text-xl py-4">{{ $article->title }}</h2>
            <p class="">
                {{ $article->desc }}
                <span class="px-1"></span>

                <a href="blog/article/{{ $article->id }}/{{ $title }}">
                    @component('components.text-button', ['value' => __('me_str.read_more')])
                    @endcomponent
                </a>
            </p>
        </div>
        <div class="p-1"></div>
        <div class="flex flex-wrap gap-2 items-center justify-center">
            <div class="flex gap-2 bg-primary-light dark:bg-primary-dark rounded-lg p-2 items-center">
                <span>{{ __('me_str.author') }}</span>
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
</a>
