<div class="grid gap-2">
    @section('page-title')
        {{ __('seo.title_langtool_flutter') }}
    @endsection

    @section('page-description')
        {{ __('seo.description_langtool_flutter') }}
    @endsection

    @section('social-image')
        {{ asset('assets/images/bg_langtool.png') }}
    @endsection

    <x-card>
        <x-title>{{ __('seo.title_langtool_flutter') }}</x-title>
        <x-desc>{{ __('tools.desc_langtool_flutter') }}</x-desc>
    </x-card>

    <div class="bg-secondary-light dark:bg-secondary-dark"
        :class="isFull ?
            'fixed top-0 z-50 left-0 right-0 h-screen grid items-start' :
            'p-2 rounded-lg items-start'"
        x-data="{
            isFull: localStorage.getItem('is_full') === 'true' ?? false,
            isDir: false,
            files: [],
            contents: {},
            lang: null,
            file: null,
        }">

        <nav class="grid h-fit bg-primary-light p-2 dark:bg-primary-dark dark:text-primary-light"
            :class="isFull ? '' : 'rounded-lg'">
            <div class="flex">
                <x-tools.full-page />

                <div class="grow"></div>

                <x-tools.select-dir-btn />
            </div>
            <x-tools.tabs-files />

            <x-tools.add-key-value />
        </nav>

        <div :class="isFull ? 'h-full overflow-y-scroll pr-4 ' : ''" x-show="Alpine.store('langtool').isDir">
            <div class="flex w-full pb-2" dir="ltr">
                <div class="grow text-center">{{ __('tools.keys') }}</div>
                <div class="grow text-center">{{ __('tools.values') }}</div>
            </div>

            <div class="grid gap-2">
                <template
                    x-for="[key, value] in Object.entries(Alpine.store('langtool').contents[Alpine.store('langtool').file]??{})">
                    <div class="flex w-full gap-2" dir="ltr">
                        <div x-on:click="transOneNow(key, Alpine.store('langtool').lang, true, key)"
                            :title="'{{ __('tools.trans_data') }}: ' + key + ' {{ __('tools.to') }} ' + 'en'"
                            dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}">
                            <x-tools.trans />
                        </div>
                        <input type="text" :value="key" placeholder="{{ __('me_str.key') }}"
                            class="inputKey block h-fit w-full grow rounded-lg bg-primary-light p-2 text-code-2-light outline-accent focus:outline dark:bg-primary-dark dark:text-code-2-dark">
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
                </template>
            </div>

            {{-- Translate --}}
            <div class="my-2 flex items-center rounded-lg bg-primary-light p-2 dark:bg-primary-dark" dir="ltr"
                x-show="Alpine.store('langtool').isDir">
                <div class="flex w-fit grow justify-center gap-2">
                    <input type="checkbox" id="key-trans" wire:model='transKey'>
                    <label for="key-trans">{{ __('tools.keys') }}</label><br>
                </div>
                <div class="flex grow justify-center">
                    <button class="rounded-full bg-accent p-2 font-extrabold text-primary-dark hover:text-primary-light"
                        x-on:click='transNow()'>{{ __('tools.trans_now') }}</button>
                </div>
                <div class="flex w-fit grow justify-center gap-2">
                    <label for="value-trans">{{ __('tools.values') }}</label><br>
                    <input type="checkbox" id="value-trans" wire:model='transValue'>
                </div>
            </div>
        </div>

        <x-tools.select-dir />

        <div wire:loading.delay>
            <x-wite />
        </div>

        <x-msg />

        @push('scripts')
            @vite(['resources/js/tools/langtool.js'])
            <script>
                document.addEventListener('alpine:init', () => {
                    window.Alpine.store('langtool', {
                        isDir: false,
                        files: [],
                        contents: {},
                        lang: null,
                        file: null,
                    });
                });

                document.addEventListener('livewire:initialized', () => {
                    window.transNow = function() {
                        @this.dispatch('transNow', {
                            'data': Alpine.store('langtool').contents
                        });
                    }

                    window.transOneNow = function(data, lang, isKey, oldKey) {
                        @this.dispatch('transOneNow', {
                            'data': data,
                            'lang': lang,
                            'isKey': isKey,
                            'oldKey': oldKey,
                        });
                    }

                    @this.on('done-trans', (contents) => {
                        Alpine.store('langtool').contents = contents[0];
                        jsonToDartAll();
                    });

                    @this.on('done-trans-one', (data) => {
                        if (data[0]['oldKey'] !== data[0]['data']) {
                            if (data[0]['isKey']) {
                                editItem(data[0]['data'], data[0]['data'], data[0]['oldKey'], true);
                            } else {
                                editItem(data[0]['oldKey'], data[0]['data'], data[0]['oldKey'], false);
                            }
                        }
                    });
                });
            </script>
        @endpush
        <script>
            document.getElementById('value').innerText = '';
        </script>
    </div>
</div>
