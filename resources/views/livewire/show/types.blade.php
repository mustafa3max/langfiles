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

        {{--  --}}
        <button data-tooltip-target="tooltip-default" type="button"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Default
            tooltip</button>
        <div id="tooltip-default" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            Tooltip content
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        {{--  --}}
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
                        'route' => 'file/' . str_replace(LaravelLocalization::getCurrentLocale() . '_', 'type_', $type->table),
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
