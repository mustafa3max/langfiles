<div>
    <div class="grid gap-2">
        @component('components.search', ['submitForm' => 'articles', 'isSearch' => true])
        @endcomponent
        @forelse ($articles as $article)
            @component('components.item-blog', ['article' => $article])
            @endcomponent
        @empty
        @endforelse
    </div>
</div>
