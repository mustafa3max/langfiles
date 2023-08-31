<x-card>
    @section('page-title')
        {{ __('seo.title_convert') }}
    @endsection
    @section('page-description')
        {{ __('seo.description_convert') }}
    @endsection
    <x-title value="{{ __('seo.title_convert') }}" />
    <div class="flex flex-wrap gap-2">
        <div class="flex flex-wrap gap-2" x-data="{
            extensions: {{ json_encode(Globals::supportedExtensions()) }},
            clicks: [false, false, false, false, false, false, false]
        }">
            <template x-for="(extension, index) in extensions">
                <button class="rounded-lg border border-primary-light px-2 py-1 uppercase dark:border-primary-dark"
                    x-text="extension"
                    x-on:click="window.convertNow(extension);clicks = [false, false, false, false, false, false, false]; clicks[index]=true"
                    :class="clicks[index] ? '' : 'bg-primary-light dark:bg-primary-dark'"></button>
            </template>
        </div>
    </div>

    <x-full-one>
        <div x-show="select" class="grid gap-2 p-2">
            <label class="block">{{ __('convert.json_input') }}</label>
            <div contenteditable dir="ltr" id="type-1"
                class="w-full overflow-auto whitespace-nowrap rounded-lg bg-secondary-light p-4 outline-0 dark:bg-secondary-dark">
            </div>
        </div>
        <div class="w-full whitespace-nowrap rounded-b-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark"
            x-show="!select">
            <div class="flex flex-wrap items-center gap-4">
                <div class="grid grow gap-2">
                    <label class="block">{{ __('me_str.key') }}</label>
                    <input id="key" type="text"
                        class="w-full rounded-lg bg-secondary-light p-4 outline-0 dark:bg-secondary-dark"
                        placeholder="{{ __('convert.write_here') }}">
                </div>
                <div class="grid grow gap-2">
                    <label class="block">{{ __('me_str.value') }}</label>
                    <input id="value" type="text"
                        class="w-full rounded-lg bg-secondary-light p-4 outline-0 dark:bg-secondary-dark"
                        placeholder="{{ __('convert.write_here') }}">
                </div>
                <button onclick="add()" class="flex h-12 w-12 items-center justify-center rounded-full bg-accent"
                    title="{{ __('convert.add') }}"><x-svg.add /></button>
            </div>
        </div>
    </x-full-one>

    <div class="grid gap-2">
        <div class="flex flex-wrap gap-2">
            <button x-data="{ click: false }" class="w-fit rounded-lg bg-accent px-2 py-1 uppercase"
                x-on:click="window.copyContent(); click=true; setTimeout(() => {click=false;}, 800);"
                :class="click ? 'bg-transparent' : 'dark:bg-accent text-primary-dark'">{{ __('me_str.copy_to_clipboard') }}</button>
            <div class="grow"></div>
            <button class="w-fit rounded-lg border border-accent px-2 py-1 uppercase text-accent dark:border-accent"
                x-on:click="window.delete()">{{ __('me_str.delete') }}</button>
        </div>
        <div dir="ltr" id="type-2"
            class="h-fit overflow-x-auto whitespace-nowrap rounded-lg bg-primary-light p-4 font-bold dark:bg-primary-dark">
            {{ __('convert.final_output') }}
        </div>
    </div>
    @vite('resources/js/converts/convert.js')
</x-card>
