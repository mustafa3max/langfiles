<div class="grid gap-2">
    @section('page-title')
        {{ __('seo.title_langtool_laravel') }}
    @endsection

    @section('page-description')
        {{ __('seo.description_langtool_laravel') }}
    @endsection

    @section('social-image')
        {{ asset('assets/images/bg_langtool.png') }}
    @endsection

    <x-card>
        <x-title>{{ __('seo.title_langtool_laravel') }}</x-title>
        <x-desc>{{ __('tools.desc_langtool_laravel') }}</x-desc>
    </x-card>

    <div class="bg-secondary-light dark:bg-secondary-dark"
        :class="isFull ?
            'fixed top-0 z-50 left-0 right-0 bottom-0  h-screen grid items-start' :
            'p-2 rounded-lg items-start'"
        x-data="{
            isFull: localStorage.getItem('is_full') === 'true' ?? false,
            isDir: false,
            files: {},
            languages: [],
            contents: { '': {} },
            lang: '',
            file: null,
            manualSaving: false,
        }">

        <nav class="grid h-fit gap-2 bg-primary-light p-2 dark:bg-primary-dark dark:text-primary-light"
            :class="isFull ? '' : 'rounded-lg'">
            <div class="flex">
                <x-tools.full-page />

                <div class="grow"></div>

                <x-tools.select-dir-btn />
            </div>

            <x-tools.tabs-lang />
            <x-tools.tabs-files-laravel />

            <x-tools.add-key-value />
        </nav>

        <div :class="isFull ? 'h-full overflow-y-scroll pr-4 ' : ''" x-show="Alpine.store('langtool').isDir">
            <div class="flex w-full pb-2" dir="ltr">
                <div class="grow text-center">{{ __('tools.keys') }}</div>
                <div class="grow text-center">{{ __('tools.values') }}</div>
            </div>

            <div class="grid gap-2">
                <template
                    x-for="[key, value] in Object.entries(Alpine.store('langtool').contents[Alpine.store('langtool').lang][Alpine.store('langtool').file]??{})">
                    <div class="flex w-full gap-2" dir="ltr" :class="typeof value == 'object' ? 'flex-wrap' : ''">

                        {{-- Key --}}
                        <div class="flex grow gap-2"
                            :class="typeof value == 'object' ? 'border-t-2 border-primary-light pt-2 dark:border-primary-dark' :
                                ''">
                            <div x-on:click="transOneNow(key, Alpine.store('langtool').lang, true, key)"
                                :title="'{{ __('tools.trans_data') }}: ' + key + ' {{ __('tools.to') }} ' + 'en'"
                                dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
                                <x-tools.trans />
                            </div>
                            <input type="text" :value="key" placeholder="{{ __('me_str.key') }}"
                                class="inputKey block h-fit w-full grow rounded-lg bg-primary-light p-2 text-code-2-light outline-accent focus:outline dark:bg-primary-dark dark:text-code-2-dark">
                        </div>

                        {{-- Value String --}}
                        <div class="flex grow gap-2" x-show="typeof value != 'object'; ">
                            <div type="text" x-text="value" contenteditable="true"
                                data-placeholder="{{ __('me_str.value') }}"
                                :dir="Alpine.store('langtool').lang == 'ar' ? 'rtl' : 'ltr'"
                                class="inputValue block w-full grow rounded-lg bg-primary-light p-2 text-code-1-light outline-accent focus:outline dark:bg-primary-dark dark:text-code-1-dark">
                            </div>
                            <div x-on:click="transOneNow(value, Alpine.store('langtool').lang, false, key)"
                                :title="'{{ __('tools.trans_data') }}: ' +
                                value + ' {{ __('tools.to') }} ' + Alpine.store('langtool').lang"
                                dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
                                <x-tools.trans />
                            </div>
                        </div>

                        {{-- Value Object --}}
                        <div x-data="{ values: {} }" @notify.window="values = value"
                            class="grid grow gap-2 border-b-2 border-primary-light pb-2 dark:border-primary-dark"
                            x-show="typeof value == 'object'" x-init="typeof value == 'object' ? values = value : values = {};">
                            <template x-for="[keyObj, valueObj] in Object.entries(values)">
                                <div class="flex gap-2">
                                    {{-- Key --}}
                                    <div class="flex grow gap-2">
                                        <div x-on:click="transOneNow(keyObj, Alpine.store('langtool').lang, true, keyObj, key)"
                                            :title="'{{ __('tools.trans_data') }}: ' + key + ' {{ __('tools.to') }} ' + 'en'"
                                            dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
                                            <x-tools.trans />
                                        </div>
                                        <input type="text" :value="keyObj" :title="key"
                                            placeholder="{{ __('me_str.key') }}"
                                            class="inputKey block h-fit w-full grow rounded-lg bg-primary-light p-2 text-code-2-light outline-accent focus:outline dark:bg-primary-dark dark:text-code-2-dark">
                                    </div>

                                    {{-- Value String --}}
                                    <div class="flex grow gap-2">
                                        <div type="text" x-text="valueObj" contenteditable="true"
                                            data-placeholder="{{ __('me_str.value') }}"
                                            :dir="Alpine.store('langtool').lang == 'ar' ? 'rtl' : 'ltr'"
                                            class="inputValue block w-full grow rounded-lg bg-primary-light p-2 text-code-1-light outline-accent focus:outline dark:bg-primary-dark dark:text-code-1-dark">
                                        </div>
                                        <div x-on:click="transOneNow(valueObj, Alpine.store('langtool').lang, false, keyObj, key)"
                                            :title="'{{ __('tools.trans_data') }}: ' +
                                            valueObj + ' {{ __('tools.to') }} ' + Alpine.store('langtool').lang"
                                            dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
                                            <x-tools.trans />
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </template>
            </div>

            {{-- Translate Select File --}}
            <div class="my-2 grid items-center gap-2 rounded-lg bg-primary-light p-2 dark:bg-primary-dark"
                dir="ltr" x-show="Alpine.store('langtool').isDir">
                <h2 class="text-center text-2xl">{{ __('tools.trans_now') }}</h2>
                <div class="flex items-center">
                    <div class="flex w-fit grow justify-center gap-2">
                        <input type="checkbox" id="key-trans" wire:model='transKey'>
                        <label for="key-trans">{{ __('tools.keys') }}</label><br>
                    </div>
                    <div class="flex w-fit grow justify-center gap-2">
                        <label for="value-trans">{{ __('tools.values') }}</label><br>
                        <input type="checkbox" id="value-trans" wire:model='transValue'>
                    </div>
                </div>

                <div class="flex flex-wrap items-center justify-center gap-2">
                    <button
                        class="rounded-full border-2 border-accent px-6 py-2 font-extrabold text-accent hover:text-primary-dark dark:hover:text-primary-light"
                        x-on:click='transNow()'>{{ __('tools.trans_all_files') }}</button>
                    <button
                        class="rounded-full bg-accent px-6 py-2 font-extrabold text-primary-dark hover:text-primary-light"
                        x-on:click='transSelectFileNow()'>{{ __('tools.trans_select_file') }}</button>
                </div>
            </div>
        </div>

        <x-tools.select-dir />

        <div wire:loading.delay>
            <x-wite />
        </div>

        <x-msg />

        @push('scripts')
            @vite(['resources/js/tools/langtool-laravel.js'])
            <script>
                document.addEventListener('alpine:init', () => {
                    window.Alpine.store('langtool', {
                        isDir: false,
                        files: {},
                        languages: [],
                        contents: {
                            '': {}
                        },
                        lang: '',
                        file: null,
                        manualSaving: false
                    });
                });

                document.addEventListener('livewire:initialized', () => {
                    window.transNow = function() {
                        @this.dispatch('transNow', {
                            'data': Alpine.store('langtool').contents
                        });
                    }

                    window.transOneNow = function(data, lang, isKey, oldKey, key = null) {
                        @this.dispatch('transOneNow', {
                            'data': data,
                            'lang': lang,
                            'isKey': isKey,
                            'oldKey': oldKey,
                            'key': key,
                        });
                    }

                    window.transSelectFileNow = function() {
                        Alpine.store('langtool').files[Alpine.store('langtool').lang].forEach(file => {
                            if (file == Alpine.store('langtool').file) {
                                @this.dispatch('transSelectFileNow', {
                                    'data': Alpine.store('langtool').contents[Alpine.store('langtool')
                                        .lang][Alpine.store('langtool').file],
                                    'lang': Alpine.store('langtool').lang,
                                    'file': file,
                                });
                            }
                        });
                    }

                    @this.on('done-trans', (contents) => {
                        Alpine.store('langtool').contents = contents[0];
                        jsonToDartAllNow();
                    });

                    @this.on('done-trans-one', (data) => {
                        if (data[0]['oldKey'] !== data[0]['data']) {
                            if (data[0]['isKey']) {
                                editItemNow(data[0]['data'], data[0]['data'], data[0]['oldKey'], true, data[0][
                                    'key'
                                ]);
                            } else {
                                editItemNow(data[0]['oldKey'], data[0]['data'], data[0]['oldKey'], false, data[0][
                                    'key'
                                ]);
                            }
                        }
                    });

                    @this.on('done-trans-select', (contents) => {
                        const data = contents[0]['data'];
                        const lang = contents[0]['lang'];
                        const file = contents[0]['file'];
                        Alpine.store('langtool').contents[lang][file] = data;
                        jsonToDartSelectFileAll(Alpine.store('langtool').contents[lang][file]);
                    });
                });
            </script>
        @endpush
        <script>
            document.getElementById('value').innerText = '';
        </script>
    </div>
</div>
