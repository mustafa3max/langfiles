<div>
    @section('page-title')
        {{ __('seo.title_articles') }}
    @endsection

    @section('page-description')
        {{ __('seo.description_articles') }}
    @endsection

    <x-card>
        <div class="grid gap-2">
            @component('components.search', ['submitForm' => 'articles', 'isSearch' => true, 'search' => $search])
            @endcomponent
            @forelse ($articles as $article)
                @component('components.item-blog', ['article' => $article])
                @endcomponent
            @empty
                @component('components.empty', ['route' => '/blog'])
                @endcomponent
            @endforelse
        </div>
    </x-card>

    <div class="p-1"></div>
    @component('components.share-buttons', ['share' => $share])
    @endcomponent
</div>
