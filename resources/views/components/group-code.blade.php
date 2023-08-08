<x-card>
    <h2 class="mb-2 rounded-lg bg-primary-light p-3 text-center text-2xl font-semibold dark:bg-primary-dark">
        {{ __('me_str.me_str_trans') }}</h2>
    <div id="parent-me-code">
        <div x-data="{ convert: [true, false, false, false, false, false] }" id="child-me-code">
            <div class="justify-cente relative flex items-center">
                <div class="grow">
                    <x-convert-to />
                </div>
                <x-copy-code i="0" />
            </div>
            <div class="p-1"></div>
            <div dir="ltr" class="rounded-lg bg-primary-light p-4 dark:bg-primary-dark">
                <div x-data="{ codeAll: JSON.parse(localStorage.getItem('codeAll')) }" wire:model='code' class="text-lg font-semibold">
                    {{-- JSON --}}
                    <template x-for="key in Object.entries(codeAll)" x-show="convert[0]">
                        <x-item-group-code html="jsonOrPhp(key[0], key.pop(), false)" index="0" />
                    </template>
                    {{-- PHP --}}
                    <template x-for="key in Object.entries(codeAll)" x-show="convert[1]">
                        <x-item-group-code html="jsonOrPhp(key[0], key.pop(), true)" index="1" key="key" />
                    </template>
                    {{-- PHP --}}
                    <template x-for="key in Object.entries(codeAll)" x-show="convert[2]">
                        <x-item-group-code html="android(key[0], key.pop(), true)" index="2" />
                    </template>
                    {{-- IOS --}}
                    <template x-for="key in Object.entries(codeAll)" x-show="convert[3]">
                        <x-item-group-code html="ios(key[0], key.pop(), true)" index="3" />
                    </template>
                    {{-- DJANGO --}}
                    <template x-for="key in Object.entries(codeAll)" x-show="convert[4]">
                        <x-item-group-code html="django(key[0], key.pop(), true)" index="4" />
                    </template>
                    {{-- XLF --}}
                    <template x-for="key in Object.entries(codeAll)" x-show="convert[5]">
                        <x-item-group-code html="xlf(key[0], key.pop(), true)" index="5" />
                    </template>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/convert.js') }}"></script>
</x-card>
