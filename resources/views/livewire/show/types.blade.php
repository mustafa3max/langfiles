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
            class="grid max-ss:grid-cols-1 max-sm:grid-cols-2 max-md:grid-cols-3 max-lg:grid-cols-4 grid-cols-5 gap-2">
            @forelse ($types as $type)
                @php
                    $language = $type->name[0] . $type->name[1];
                @endphp
                @if (in_array($language, $languages))
                    @php
                        $data = str_replace('ar', '', $type->name);
                        $data = str_replace('en', '', $data);
                        $data = str_replace('_', ' ', $data);
                    @endphp
                    @component('components.item-show', [
                        'data' => $data,
                        'lang' => explode('_', $type->name)[0],
                        'route' => 'file',
                        'dataRoute' => ['type' => $type->name],
                        'countItems' => $this->countItems($type->name),
                    ])
                    @endcomponent
                @endif
            @empty
            @endforelse
        </div>
        {{ $types->links('vendor.livewire.simple-tailwind') }}
    </div>

</div>
