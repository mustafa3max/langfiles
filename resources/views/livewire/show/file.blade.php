<div x-data="{ isCode: false }">
    @section('page-title')
        {{ __('seo.title_file', ['TYPE' => __('tables.' . $title)]) }}
    @endsection
    @section('page-description')
        {{ __('seo.description_file', ['TYPE' => __('tables.' . $title)]) }}
    @endsection
    @section('page-keywords')
        {{ __('seo.key_words_file', ['TYPE' => __('tables.' . $title)]) }}
    @endsection

    <x-card>
        @component('components.title-file', ['title' => $this->title, 'lang' => $this->lang, 'count' => count($dataAll)])
        @endcomponent
        {{-- Data Show --}}
        <div x-show="!isCode" class="grid gap-2">
            <div class="flex justify-start content-center gap-2 ">

                <div class="flex justify-center items-center gap-4">
                    <div wire:click='copy' x-on:click="isCode=true" x-show="!isCode">
                        @component('components.btn-file', ['icon' => 'code', 'text' => __('me_str.code_mode')])
                        @endcomponent
                    </div>
                </div>
                {{-- Undo Delete Item --}}
                @if (count($data) > 0)
                    <button
                        class="p-4 bg-accent hover:text-primary-light flex items-center justify-center gap-4 rounded-lg"
                        wire:click='undo()'>{{ __('me_str.undo') }}<i class="fa-solid fa-undo"></i></button>
                @endif
            </div>

            <div wire:loading>
                <x-load.load-file />
            </div>
            <div class="flex flex-wrap gap-2 relative" wire:loading.remove>
                @forelse ($dataAll as $data)
                    @component('components.item-file', ['data' => $data])
                    @endcomponent
                @empty
                    @component('components.empty', ['route' => 'file', 'dataRoute' => ['type' => $table]])
                    @endcomponent
                @endforelse

            </div>

        </div>

        {{-- Data Copy --}}
        <div class="bg-secondary-light dark:bg-secondary-dark rounded-lg w-full h-full grid gap-2" x-show="isCode">
            <div class="flex gap-2" wire:loading.remove wire:target="{{ $dataCopy }}">
                <div x-on:click="isCode=false">
                    @component('components.btn-file', ['icon' => 'bars-staggered', 'text' => __('me_str.text_mode')])
                    @endcomponent
                </div>
                <div class="grow"></div>
                <div onclick="copyContent()">
                    @component('components.btn-file', ['icon' => 'copy', 'text' => __('me_str.copy_code')])
                    @endcomponent
                </div>
            </div>

            <div class="flex items-center justify-center">
                <div class="bg-primary-light dark:bg-primary-dark p-4 rounded-lg  overflow-hidden w-full"
                    dir="ltr">
                    <div class="w-full" wire:loading>
                        <x-load-code />
                    </div>
                    <code id="code" class="whitespace-pre-wrap" xt="dataset.bibText"
                        wire:loading.remove>{{ $dataCopy }}</code>
                </div>
            </div>
        </div>
    </x-card>

    <div class="p-1"></div>
    @component('components.share-buttons', ['share' => $share])
    @endcomponent
    <div class="p-1"></div>

    <x-card>
        <h2 class="bg-primary-light dark:bg-primary-dark p-2 rounded-lg font-bold">
            {{ __('me_str.content_other_lang', ['TITLE' => __('tables.' . $this->title)]) }}
        </h2>
        <div wire:loading wire:target="{{ $this->types() }}">
            <x-load.load-types-file />
        </div>

        <div class="p-1"></div>

        <div id="files" wire:loading.remove wire:target="{{ $this->types() }}"
            class="{{ count($this->types()) > 0 ? 'flex' : '' }} flex-wrap gap-2">

            @forelse ($this->types() as $type)
                <div class="grow">
                    @component('components.item-show-file', [
                        'data' => $type['name_' . $currentLng],
                        'lang' => $type->lang,
                        'route' => 'file',
                        'dataRoute' => ['type' => $type->table],
                        'countItems' => $this->countItems($type->table),
                    ])
                    @endcomponent
                </div>
            @empty
                @component('components.empty', ['route' => 'file?type=' . $this->table])
                @endcomponent
            @endforelse
        </div>
    </x-card>

    <script>
        const copyContent = async () => {
            const code = document.getElementById('code').innerText;
            try {
                if (navigator.clipboard) {
                    await navigator.clipboard.writeText(code);
                    alert('تم نسخ الشفرة');
                } else {
                    alert(code);
                }
            } catch (err) {
                alert(code);

            }
        }
    </script>

</div>
