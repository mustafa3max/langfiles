<div x-data="{ isCode: true, isAr: JSON.parse(sessionStorage.getItem('isAr')) ?? true }" class="overflow-hidden">
    @section('page-title')
        {{ __('seo.title_file', ['TYPE' => __('tables.' . $title)]) }}
    @endsection

    @section('page-description')
        {{ __('seo.description_file', ['TYPE' => __('tables.' . $title)]) }}
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
                <div class="grow"></div>
                {{-- Undo Delete Item --}}
                @if (count($this->keys) > 0)
                    <div wire:click='undo()'>
                        <x-btn-file text="__('me_str.undo')">
                            <x-svg.undo />
                        </x-btn-file>
                    </div>
                @endif
                <div x-on:click="isCode=true">
                    <x-btn-file text="__('me_str.code_mode')">
                        <x-svg.code />
                    </x-btn-file>
                </div>
            </div>

            <x-langs>
                <div class="mb-2 p-4">
                    <div wire:loading.delay>
                        <x-load.load-file />
                    </div>
                    <div class="flex flex-wrap gap-4" x-show="isAr" wire:loading.remove>
                        @forelse ($dataEdit[0] as $data)
                            @component('components.item-file', ['data' => $data, 'file' => $dataEdit, 'isType' => false])
                            @endcomponent
                        @empty
                            @component('components.empty', ['route' => $table])
                            @endcomponent
                        @endforelse
                    </div>
                    <div class="flex flex-wrap gap-4" x-show="!isAr" wire:loading.remove>
                        @forelse ($dataEdit[1] as $data)
                            @component('components.item-file', ['data' => $data, 'file' => $dataEdit, 'isType' => false])
                            @endcomponent
                        @empty
                            @component('components.empty', ['route' => $table])
                            @endcomponent
                        @endforelse
                    </div>
                </div>
            </x-langs>
        </div>

        {{-- Code Mode --}}
        <div class="grid h-full w-full gap-2 rounded-lg bg-secondary-light dark:bg-secondary-dark" x-show="isCode">
            <x-convert-to />
            <div class="grid w-full grid-cols-1 gap-2">
                <div class="w-full">
                    <x-langs>
                        <div class="w-full">
                            <div class="w-full" wire:loading.delay>
                                <x-load.load-code />
                            </div>
                            <div class="relative" wire:loading.remove dir="ltr" x-show="isAr">
                                <div class="absolute end-0 flex gap-2 p-4" x-data="{ isCopy: false }">
                                    <x-copy-code i="code-0" />
                                </div>
                                <div id="code-0" class="p-4 text-lg font-semibold" wire:key="{{ rand() }}">
                                    <div class="no-scrollbar w-full overflow-auto whitespace-nowrap">
                                        <div x-data="{ data: '{{ $json[0] }}' }" x-show="convert[0]" x-html="data"></div>
                                        <div x-data="{ data: '{{ $php[0] }}' }" x-show="convert[1]" x-html="data"></div>
                                        <div x-data="{ data: '{{ $android[0] }}' }" x-show="convert[2]" x-html="data"
                                            class="flex-shrink-0"></div>
                                        <div x-data="{ data: '{{ $ios[0] }}' }" x-show="convert[3]" x-html="data"></div>
                                        <div x-data="{ data: '{{ $django[0] }}' }" x-show="convert[4]" x-html="data"></div>
                                        <div x-data="{ data: '{{ $xlf[0] }}' }" x-show="convert[5]" x-html="data"></div>
                                        <div x-data="{ data: '{{ $csv[0] }}' }" x-show="convert[6]" x-html="data"></div>
                                        <div x-data="{ data: '{{ $html[0] }}' }" x-show="convert[7]" x-html="data"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="relative" wire:loading.remove dir="ltr" x-show="!isAr">
                                <div class="absolute end-0 flex gap-2 p-4" x-data="{ isCopy: false }">
                                    <x-copy-code i="code-1" />
                                </div>
                                <div id="code-1" class="p-4 text-lg font-semibold" wire:key="{{ rand() }}">
                                    <div class="no-scrollbar w-full overflow-auto whitespace-nowrap">
                                        <div x-data="{ data: '{{ $json[1] }}' }" x-show="convert[0]" x-html="data"></div>
                                        <div x-data="{ data: '{{ $php[1] }}' }" x-show="convert[1]" x-html="data"></div>
                                        <div x-data="{ data: '{{ $android[1] }}' }" x-show="convert[2]" x-html="data"
                                            class="flex-shrink-0"></div>
                                        <div x-data="{ data: '{{ $ios[1] }}' }" x-show="convert[3]" x-html="data"></div>
                                        <div x-data="{ data: '{{ $django[1] }}' }" x-show="convert[4]" x-html="data"></div>
                                        <div x-data="{ data: '{{ $xlf[1] }}' }" x-show="convert[5]" x-html="data"></div>
                                        <div x-data="{ data: '{{ $csv[0] }}' }" x-show="convert[6]" x-html="data"></div>
                                        <div x-data="{ data: '{{ $html[1] }}' }" x-show="convert[7]" x-html="data"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-langs>
                </div>
            </div>
        </div>

        <div class="p-1"></div>
        @component('components.share-buttons', ['share' => $share])
        @endcomponent

        <div class="p-1"></div>

        <div>
            <h2 class="rounded-lg bg-primary-light p-4 font-bold dark:bg-primary-dark">
                {{ __('me_str.more_files_json') }}
            </h2>
            <div wire:loading.delay wire:target="{{ $this->types() }}">
                <x-load.load-types-file />
            </div>

            <div class="p-1"></div>

            <div id="files" wire:loading.remove wire:target="{{ $this->types() }}"
                class="{{ count($this->types()) > 0 ? 'flex' : '' }} flex-wrap gap-2">

                @forelse ($this->types() as $type)
                    @php
                        $route = str_replace(LaravelLocalization::getCurrentLocale() . '_', 'type_', $type->table);
                        $route = str_replace('_', '-', $route);
                    @endphp

                    <div class="grow">
                        @component('components.item-show', [
                            'data' => $type['name_' . $currentLang],
                            'lang' => $type->lang,
                            'moreLang' => $this->moreLang($type->table),
                            'route' => '/file/' . $route,
                            'countItems' => $this->countItems($type->table),
                        ])
                        @endcomponent
                    </div>
                @empty
                    @component('components.empty', ['route' => $table])
                    @endcomponent
                @endforelse
            </div>
        </div>
    </x-card>
</div>
