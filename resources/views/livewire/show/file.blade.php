<div x-data="{ isCode: true, isAlert: false, convert: [true, false, false] }">
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
        @component('components.title-file', [
            'title' => $this->title,
            'count' => count($dataEdit[0]),
        ])
        @endcomponent
        {{-- Edit Mode --}}
        <div x-show="!isCode">
            <div class="flex content-center justify-start gap-2 pb-2">
                <div wire:click='render()' x-on:click="isCode=true">
                    @component('components.btn-file', ['icon' => 'code', 'text' => __('me_str.code_mode')])
                    @endcomponent
                </div>
                {{-- Undo Delete Item --}}
                @if (count($this->keys) > 0)
                    <div wire:click='undo()'>
                        @component('components.btn-file', ['icon' => 'undo', 'text' => __('me_str.undo')])
                        @endcomponent
                    </div>
                @endif
            </div>

            @forelse ($dataEdit as $file)
                <div class="mb-2 rounded-lg bg-primary-light p-4 dark:bg-primary-dark">
                    <div wire:loading>
                        <x-load.load-file />
                    </div>
                    <div class="flex flex-wrap gap-4" wire:loading.remove>
                        @foreach ($file as $data)
                            @component('components.item-file', ['data' => $data])
                            @endcomponent
                        @endforeach
                    </div>
                </div>
            @empty
                @component('components.empty', ['route' => 'file', 'dataRoute' => ['type' => $table]])
                @endcomponent
            @endforelse
        </div>

        {{-- Code Mode --}}
        <div class="grid h-full w-full gap-2 rounded-lg bg-secondary-light dark:bg-secondary-dark" x-show="isCode">
            <div class="flex flex-wrap gap-2">
                <div x-on:click="isCode=false">
                    @component('components.btn-file', ['icon' => 'pen', 'text' => __('me_str.edit_mode')])
                    @endcomponent
                </div>

                <x-convert-to />

                <div class="grow" x-show="isAlert" x-transition.duration.500ms>
                    <x-alert />
                </div>
            </div>

            <div class="grid gap-2">
                @for ($i = 0; $i < count($dataJson); $i++)
                    <div class="overflow-hidden rounded-lg bg-primary-light dark:bg-primary-dark">
                        <div class="w-full" wire:loading>
                            <x-load-code />
                        </div>
                        <div class="grid w-full" wire:loading.remove>
                            <button title="__('me_str.copy_code')" x-on:click="isAlert=true"
                                onclick="copyContent('code-{{ $i }}')"
                                class="h-12 w-12 rounded-lg text-accent hover:bg-accent hover:text-secondary-light">
                                <i class="fa-solid fa-copy"></i>
                            </button>

                            <div dir="ltr" id="code-{{ $i }}"
                                class="no-scrollbar font- overflow-scroll p-4 text-lg" wire:key="{{ rand() }}">
                                <div x-data="{ myData: '{{ $json[$i] }}' }" x-show="convert[0]" x-html="myData"></div>
                                <div x-data="{ myData: '{{ $php[$i] }}' }" x-show="convert[1]" x-html="myData"></div>
                                <div x-data="{ myData: '{{ $android[$i] }}' }" x-show="convert[2]" x-html="myData"></div>
                                <div x-data="{ myData: '{{ $ios[$i] }}' }" x-show="convert[3]" x-html="myData"></div>
                            </div>
                        </div>

                    </div>
                @endfor

            </div>
        </div>
    </x-card>

    <div class="p-1"></div>
    @component('components.share-buttons', ['share' => $share])
    @endcomponent
    <div class="p-1"></div>

    <x-card>
        <h2 class="rounded-lg bg-primary-light p-4 font-bold dark:bg-primary-dark">
            {{ __('me_str.more_files_json') }}
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
                        'route' => str_replace(LaravelLocalization::getCurrentLocale() . '_', 'type_', $type->table),
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
        const copyContent = async (idCode) => {
            const code = document.getElementById(idCode).innerText;
            try {
                if (navigator.clipboard) {
                    await navigator.clipboard.writeText(code);
                } else {
                    alert(code);
                }
            } catch (err) {
                alert(code);
            }
        }
    </script>
</div>
