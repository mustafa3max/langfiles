<div x-data="{ isCode: true, convert: [true, false, false, false, false, false] }" class="overflow-hidden">
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
                <div class="grow"></div>
                {{-- Undo Delete Item --}}
                @if (count($this->keys) > 0)
                    <div wire:click='undo()'>
                        @component('components.btn-file', ['icon' => 'undo', 'text' => __('me_str.undo')])
                        @endcomponent
                    </div>
                @endif
                <div x-on:click="isCode=true">
                    @component('components.btn-file', ['icon' => 'code', 'text' => __('me_str.code_mode')])
                    @endcomponent
                </div>
            </div>

            @php
                $index = -1;
            @endphp

            @forelse ($dataEdit as $file)
                @php
                    $index++;
                @endphp
                <div class="w-fit rounded-t-lg bg-primary-light px-7 pb-2 pt-5 dark:bg-primary-dark">
                    {{ __('lang.' . Globals::languages()[$index]) }}
                </div>
                <div class="mb-2 rounded-b-lg rounded-e-lg bg-primary-light p-4 dark:bg-primary-dark">
                    <div wire:loading>
                        <x-load.load-file />
                    </div>
                    <div class="flex flex-wrap gap-4" wire:loading.remove>
                        @forelse ($file as $data)
                            @component('components.item-file', ['data' => $data, 'file' => $dataEdit, 'isType' => false])
                            @endcomponent
                        @empty
                            @component('components.empty', ['route' => $table])
                            @endcomponent
                        @endforelse
                    </div>
                </div>
            @empty
                @component('components.empty', ['route' => $table])
                @endcomponent
            @endforelse
        </div>
        {{-- Code Mode --}}
        <div class="grid h-full w-full gap-2 rounded-lg bg-secondary-light dark:bg-secondary-dark" x-show="isCode">
            <x-convert-to />

            <div class="grid w-full grid-cols-1 gap-2">
                @for ($i = 0; $i < count($dataJson); $i++)
                    <div class="w-full">
                        <div class="w-fit rounded-t-lg bg-primary-light px-7 pb-2 pt-5 dark:bg-primary-dark">
                            {{ __('lang.' . Globals::languages()[$i]) }}
                        </div>
                        <div class="w-full rounded-b-lg rounded-e-lg bg-primary-light dark:bg-primary-dark">
                            <div class="w-full" wire:loading>
                                <x-load.load-code />
                            </div>
                            <div class="relative" wire:loading.remove dir="ltr">
                                <div class="absolute end-0 flex gap-2 p-4" x-data="{ isCopy: false }">
                                    <x-copy-code i="code-{{ $i }}" />
                                </div>
                                <div id="code-{{ $i }}" class="p-4 text-lg font-semibold"
                                    wire:key="{{ rand() }}">
                                    {{-- <div class="text-code-2-light dark:text-code-2-dark">
                                        <div class="text-code-1-light dark:text-code-1-dark"></div>
                                    </div> --}}
                                    @if (
                                        $json[$i] == null ||
                                            $php[$i] == null ||
                                            $android[$i] == null ||
                                            $ios[$i] == null ||
                                            $django[$i] == null ||
                                            $xlf[$i] == null)
                                        @component('components.empty', ['route' => $table])
                                        @endcomponent
                                    @else
                                        <div class="no-scrollbar w-full overflow-auto whitespace-nowrap">
                                            <div x-data="{ data: '{{ $json[$i] }}' }" x-show="convert[0]" x-html="data"></div>
                                            <div x-data="{ data: '{{ $php[$i] }}' }" x-show="convert[1]" x-html="data"></div>
                                            <div x-data="{ data: '{{ $android[$i] }}' }" x-show="convert[2]" x-html="data"
                                                class="flex-shrink-0"></div>
                                            <div x-data="{ data: '{{ $ios[$i] }}' }" x-show="convert[3]" x-html="data"></div>
                                            <div x-data="{ data: '{{ $django[$i] }}' }" x-show="convert[4]" x-html="data"></div>
                                            <div x-data="{ data: '{{ $xlf[$i] }}' }" x-show="convert[5]" x-html="data"></div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
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
            <div wire:loading wire:target="{{ $this->types() }}">
                <x-load.load-types-file />
            </div>

            <div class="p-1"></div>

            <div id="files" wire:loading.remove wire:target="{{ $this->types() }}"
                class="{{ count($this->types()) > 0 ? 'flex' : '' }} flex-wrap gap-2">

                @forelse ($this->types() as $type)
                    <div class="grow">
                        @component('components.item-show', [
                            'data' => $type['name_' . $currentLng],
                            'lang' => $type->lang,
                            'moreLang' => $this->moreLang($type->table),
                            'route' => str_replace(LaravelLocalization::getCurrentLocale() . '_', 'type_', $type->table),
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
