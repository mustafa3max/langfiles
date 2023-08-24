@php
    $title = str_replace(' ', '_', $article->title);
@endphp
<a href="blog/article/{{ $article->id }}/{{ $title }}" title="{{ __('me_str.read_more') }}">
    <div class="grid items-center justify-center rounded-lg bg-secondary-light p-2 dark:bg-secondary-dark">
        <div dir="rtl">
            <x-editor.img src="{{ asset($article->thumbnail) }}" alt="{{ $article->title }}" />
            <h2 class="py-4 text-3xl font-extrabold">{{ $article->title }}</h2>
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
        <div class="flex flex-wrap items-center justify-center gap-2">
            <div class="flex items-center gap-2 rounded-lg bg-primary-light p-2 dark:bg-primary-dark">
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
