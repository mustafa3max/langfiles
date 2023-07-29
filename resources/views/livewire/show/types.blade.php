<div>
    @section('page-title')
        {{ __('seo.title_types') }}
    @endsection
    @section('page-description')
        {{ __('seo.description_types') }}
    @endsection
    @section('page-keywords')
        {{ __('seo.key_words_types') }}
    @endsection

    <div class="min-h-full">
        <div class="pb-2">
            @component('components.search', ['languages' => $languages, 'submitForm' => 'types'])
            @endcomponent
        </div>

        <div wire:loading>
            <x-load.load-types />
        </div>
        <div id="files" wire:loading.remove class="{{ count($types) > 0 ? 'flex' : '' }} flex-wrap gap-2">
            @forelse ($types as $type)
                <div class="grow">
                    @component('components.item-show', [
                        'data' => $type['name_' . $currentLng],
                        'lang' => $type->lang,
                        'route' => 'file/' . $type->table,
                        'countItems' => $this->countItems($type->table),
                    ])
                    @endcomponent
                </div>
            @empty
                @component('components.empty', ['route' => 'types'])
                @endcomponent
            @endforelse
            @component('components.share-buttons', ['share' => $share])
            @endcomponent
        </div>
        {{ $types->links('vendor.livewire.simple-tailwind', ['currentPage' => $types->currentPage(), 'lastPage' => $types->lastPage()]) }}
    </div>
</div>
