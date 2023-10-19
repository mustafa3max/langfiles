<div>
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
        <x-title value="{{ __('seo.title_langtool_flutter') }}" />
        <p class="text-center text-lg">{{ __('tools.desc_langtool_flutter') }}</p>
    </x-card>
    <div class="p-1"></div>

    <div class="bg-secondary-light dark:bg-secondary-dark"
        :class="isFull ?
            'fixed top-0 z-50 left-0 right-0  h-screen grid items-start' :
            'p-2 rounded-lg items-start'"
        x-data="{ isFull: localStorage.getItem('is_full') === 'true' ?? false, isDir: false, files: {}, languages: [], contents: {}, lang: null, file: null }">

        <nav class="grid h-fit bg-primary-light p-2 dark:bg-primary-dark dark:text-primary-light"
            :class="isFull ? '' : 'rounded-lg'">
            <div class="flex">
                <button
                    class="rounded-lg bg-primary-light p-2 text-secondary-dark dark:bg-secondary-dark dark:text-primary-light"
                    x-on:click="isFull=!isFull;is_full(isFull)"
                    :title="isFull ? '{{ __('tools.minimize_screen') }}' : '{{ __('tools.full_screen') }}'">
                    <div X-show="isFull">
                        <x-svg.not-full />
                    </div>
                    <div X-show="!isFull">
                        <x-svg.full />
                    </div>
                </button>

                <div class="grow"></div>

                <button class="rounded-lg bg-accent p-2 font-extrabold text-primary-dark"
                    onclick="select_dir_lang()">{{ __('tools.select_dir_lang') }}
                </button>
            </div>
            <x-tools.tabs-lang />
            <x-tools.tabs-files-laravel />

            <ul class="grid gap-2 rounded-lg">
                <div class="flex w-full" dir="ltr">
                    <div class="grow text-center">{{ __('me_str.key') }}</div>
                    <div class="grow text-center">{{ __('me_str.value') }}</div>
                </div>
                <div class="flex w-full gap-2" dir="ltr">
                    <input id="key" type="text" placeholder="{{ __('me_str.key') }}"
                        class="block h-fit w-full grow rounded-lg bg-secondary-light p-2 outline-accent focus:outline dark:bg-secondary-dark">
                    <div id="value" type="text" contenteditable="true"
                        :dir="Alpine.store('langtool').lang == 'ar' ? 'rtl' : 'ltr'"
                        data-placeholder="{{ __('me_str.value') }}"
                        class="block w-full grow rounded-lg bg-secondary-light p-2 outline-accent focus:outline dark:bg-secondary-dark">
                    </div>
                </div>
            </ul>
        </nav>

        <div :class="isFull ? 'h-full overflow-y-scroll pr-4 ' : ''" x-show="Alpine.store('langtool').isDir">
            <div class="flex w-full pb-2" dir="ltr">
                <div class="grow text-center">{{ __('tools.keys') }}</div>
                <div class="grow text-center">{{ __('tools.values') }}</div>
            </div>

            <div class="grid gap-2">
                <template
                    x-for="[key, value] in Object.entries(Alpine.store('langtool').contents[Alpine.store('langtool').lang][Alpine.store('langtool').file]??{})">
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

        <div class="grid w-full items-center justify-center p-8 text-center" x-show="!Alpine.store('langtool').isDir">
            <div class="flex w-full justify-center">
                <img src="{{ asset('assets/images/empty.svg') }}" alt="{{ __('me_str.no_data') }}"
                    class="block w-fit pb-4">
            </div>
            <h2 class="p-4 text-2xl font-semibold">{{ __('tools.title_not_select_dir') }}</h2>
            <p class="text-lg">{{ __('tools.desc_not_select_dir') }}</p>
            <div class="pt-8">
                <button class="w-fit rounded-lg bg-accent p-2 font-extrabold text-primary-dark"
                    onclick="select_dir_lang()">{{ __('tools.select_dir_lang') }}
                </button>
            </div>
        </div>

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
