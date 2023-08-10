<x-card>
    <h2 class="mb-2 rounded-lg bg-primary-light p-3 text-center text-2xl font-semibold dark:bg-primary-dark">
        {{ __('me_str.me_str_trans') }}</h2>
    <div id="parent-me-code">
        <div x-data="{ convert: [true, false, false, false, false, false], isSelectTab: Object.keys(meCode).length > 0 ? [true, false] : [], languages: ['{{ Globals::languages()[0] }}', '{{ Globals::languages()[1] }}'] }" id="child-me-code">
            <div class="flex items-center justify-center">
                <div class="grow">
                    <x-convert-to />
                </div>
                <x-copy-code i="me-code-0" />
            </div>
            <div class="p-1"></div>
            <div class="flex flex-wrap gap-4">
                <template x-for="(selectTab, index) in isSelectTab">
                    <button
                        class="grow rounded-t-lg border-secondary-light bg-primary-light p-2 dark:border-secondary-dark dark:bg-primary-dark"
                        :class="selectTab ? 'border-none' : 'border-b-2 opacity-70'" x-text="languages[index]"
                        x-on:click="isTab(isSelectTab); lang=languages[index];meCode = JSON.parse(localStorage.getItem(lang + 'CodeAll')) ?? {}"></button>
                </template>
            </div>
            <div dir="ltr" class="rounded-b-lg bg-primary-light p-4 dark:bg-primary-dark">
                <div wire:model='code' class="text-lg font-semibold" id="me-code-0">
                    {{-- JSON --}}
                    <div x-show="convert[0]" class="grid gap-2">
                        <template x-for="key in Object.entries(meCode)">
                            <x-item-group-code html="jsonOrPhp(key[0], key.pop(), false)" index="0" />
                        </template>
                    </div>
                    {{-- PHP --}}
                    <div x-show="convert[1]" class="grid gap-2">
                        <template x-for="key in Object.entries(meCode)">
                            <x-item-group-code html="jsonOrPhp(key[0], key.pop(), true)" index="1"
                                key="key" />
                        </template>
                    </div>
                    {{-- PHP --}}
                    <div x-show="convert[2]" class="grid gap-2">
                        <template x-for="key in Object.entries(meCode)">
                            <x-item-group-code html="android(key[0], key.pop())" index="2" />
                        </template>
                    </div>
                    {{-- IOS --}}
                    <div x-show="convert[3]" class="grid gap-2">
                        <template x-for="key in Object.entries(meCode)">
                            <x-item-group-code html="ios(key[0], key.pop())" index="3" />
                        </template>
                        {{-- DJANGO --}}
                    </div>
                    <div x-show="convert[4]" class="grid gap-2">
                        <template x-for="key in Object.entries(meCode)">
                            <x-item-group-code html="django(key[0], key.pop())" index="4" />
                        </template>
                    </div>
                    {{-- XLF --}}
                    <div x-show="convert[5]" class="grid gap-2">
                        <template x-for="key in Object.entries(meCode)" id="code-0">
                            <x-item-group-code html="xlf(key[0], key.pop())" index="5" />
                        </template>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
        function isTab(isSelectTab) {
            for (let index = 0; index < isSelectTab.length; index++) {
                isSelectTab[index] = !isSelectTab[index];
            }
            return isSelectTab;
        }
    </script>
</x-card>
