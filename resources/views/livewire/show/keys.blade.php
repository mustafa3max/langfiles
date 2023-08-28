<div x-data="{ isGroup: true, isCode: true, }">
    @section('page-title')
        {{ __('seo.title_keys') }}
    @endsection
    @section('page-description')
        {{ __('seo.description_keys') }}
    @endsection

    <x-types-keys route="{{ $route }}">

        <x-title value="{{ __('seo.title_2_keys') }}" />

        <div class="pb-2">
            @component('components.search', ['languages' => Globals::languages(), 'submitForm' => 'keys(true)'])
            @endcomponent
        </div>
        <div>
            <div wire:loading>
                <x-load.load-keys />
            </div>
            <div wire:loading.remove>
                <div class="flex flex-wrap gap-2">
                    @forelse ($keys as $key)
                        @component('components.item-file', [
                            'data' => $key,
                            'file' => $data,
                            'type' => __('tables.' . str_replace(' ', '_', $key->type)),
                            'isType' => true,
                        ])
                        @endcomponent
                    @empty
                        @component('components.empty', ['route' => 'keys'])
                        @endcomponent
                    @endforelse
                </div>

                <x-pagination count="{{ count($keys) }}" offset="{{ $offset }}" offset="{{ $offset }}">
                    {{ count($keys) }}
                    <i class="px-4 font-bold">/</i>
                    {{ $countKyes }}
                </x-pagination>
            </div>
        </div>

        <div class="p-1"></div>

        @component('components.share-buttons', ['share' => $share])
        @endcomponent
    </x-types-keys>
</div>
