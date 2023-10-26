<div>
    @section('page-title')
        {{ __('seo.title_types') }}
    @endsection

    @section('page-description')
        {{ __('seo.description_types') }}
    @endsection

    <x-card>
        <div class="min-h-full">
            <x-title>{{ __('seo.title_types') }}</x-title>

            <div class="pb-2">
                @component('components.search', ['languages' => $languages, 'submitForm' => 'types', 'search' => $this->search])
                @endcomponent
            </div>

            <div wire:loading.delay>
                <x-load.load-types />
            </div>
            <div id="files" wire:loading.remove class="{{ count($types) > 0 ? 'flex' : '' }} flex-wrap gap-2">

                @forelse ($types as $type)
                    @php
                        $route = str_replace(LaravelLocalization::getCurrentLocale() . '_', 'type_', $type->table);
                        $route = str_replace('_', '-', $route);
                    @endphp
                    <div class="grow">
                        @component('components.item-show', [
                            'data' => $type['name_' . $currentLng],
                            'lang' => $type->lang,
                            'moreLang' => $this->moreLang($type->table),
                            'route' => '/file/' . $route,
                            'countItems' => $type->number,
                        ])
                        @endcomponent
                    </div>
                @empty
                    @component('components.empty', ['route' => 'types'])
                    @endcomponent
                @endforelse


            </div>
        </div>

        {{ $types->links('vendor.livewire.me-tailwind', ['currentPage' => $types->currentPage(), 'lastPage' => $types->lastPage()]) }}

        <div class="p-1"></div>

        @component('components.share-buttons', ['share' => $share])
        @endcomponent

    </x-card>

    <script>
        return new Blob(Object.values(localStorage)).size;
    </script>
</div>
