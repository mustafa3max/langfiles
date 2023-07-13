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
        <div class="grid max-ss:grid-cols-1 max-sm:grid-cols-2 max-md:grid-cols-3 max-lg:grid-cols-4 grid-cols-5 gap-2">
            @forelse ($types as $type)
                @php
                    $language = $type[0] . $type[1];
                @endphp
                @if (in_array($language, $languages))
                    @php
                        $data = str_replace('ar', '', $type);
                        $data = str_replace('_', ' ', $data);
                    @endphp
                    @component('components.item-show', [
                        'data' => $data,
                        'route' => 'file',
                        'dataRoute' => ['type' => $type],
                        'icon' => 'object-group',
                        'countItems' => $this->countItems($type),
                    ])
                    @endcomponent
                @endif
            @empty
            @endforelse
        </div>
        {{-- {{ $allData->links('vendor.livewire.simple-tailwind') }} --}}
    </div>

</div>
