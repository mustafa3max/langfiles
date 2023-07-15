<div>
    @section('page-title')
        {{ __('seo.title_articles') }}
    @endsection
    @section('page-description')
        {{ __('seo.description_articles') }}
    @endsection
    @section('page-keywords')
        {{ __('seo.key_words_articles') }}
    @endsection

    <div class="grid gap-2">
        @component('components.search', ['submitForm' => 'articles', 'isSearch' => true])
        @endcomponent
        @forelse ($articles as $article)
            @component('components.item-blog', ['article' => $article])
            @endcomponent
        @empty
            @component('components.empty', ['route' => 'index'])
            @endcomponent
        @endforelse
    </div>
</div>
