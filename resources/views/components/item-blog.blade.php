<div>
    <div class="bg-secondary-light dark:bg-secondary-dark p-2 rounded-lg grid items-center justify-center">
        <h2 class="text-xl bg-primary-light dark:bg-primary-dark p-4 rounded-t-lg">{{ $article->title }}</h2>
        <p class="border-4 border-primary-light dark:border-primary-dark p-4 rounded-b-lg">
            {{ substr($article->article, 0, 512) }}
            <span class="px-1"></span>
            <a href="{{ route('article', ['id_article' => $article->id]) }}" class="">
                @component('components.text-button', ['value' => __('me_str.read_more')])
                @endcomponent
            </a>
        </p>
        <div class="pt-2 flex flex-wrap gap-2 items-center justify-center">
            <div class="flex gap-2 bg-primary-light dark:bg-primary-dark rounded-lg p-2 items-center">
                <span>{{ __('me_str.author') }}</span>
                <i class="fa-solid fa-list"></i>
                @component('components.text-button', ['value' => $article->author])
                @endcomponent
            </div>
            <div class="flex gap-2 bg-primary-light dark:bg-primary-dark rounded-lg p-2 items-center">
                <span>{{ __('me_str.comments') }}</span>
                <i class="fa-solid fa-list"></i>
                @component('components.text-button', ['value' => 45])
                @endcomponent
            </div>
        </div>
    </div>
</div>
