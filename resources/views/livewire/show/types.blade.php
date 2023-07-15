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

        {{-- <div class="w-full" wire:loading> --}}
        <div class="w-full" wire:loading>
            <x-load.load-types />
        </div>

        <div wire:loading.remove
            class="{{ count($types) > 0 ? 'grid' : '' }} max-ss:grid-cols-1 max-sm:grid-cols-2 max-md:grid-cols-3 max-lg:grid-cols-4 grid-cols-5 gap-2">

            @forelse ($types as $type)

                @if (in_array($type->lang, $languages))
                    @component('components.item-show', [
                        'data' => $type['name_' . $currentLng],
                        'lang' => $type->lang,
                        'route' => 'file',
                        'dataRoute' => ['type' => $type->table],
                        'countItems' => $this->countItems($type->table),
                    ])
                    @endcomponent
                @endif
            @empty
                @component('components.empty', ['route' => 'types'])
                @endcomponent
            @endforelse
        </div>
        {{ $types->links('vendor.livewire.simple-tailwind') }}
    </div>

</div>
