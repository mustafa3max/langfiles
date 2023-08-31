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
                    x-on:click="convertNow(extension);clicks = [false, false, false, false, false, false, false]; clicks[index]=true"
                    :class="clicks[index] ? '' : 'bg-primary-light dark:bg-primary-dark'"></button>
            </template>
        </div>
    </div>
    <textarea dir="ltr" id="type-1" rows="10"
        class="mt-2 w-full whitespace-nowrap rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark"
        placeholder="{{ __('convert.json_input') }}">
</textarea>
    <div class="grid gap-2">
        <button x-data="{ click: false }" class="w-fit rounded-lg bg-accent px-2 py-1 uppercase"
            x-on:click="window.copyContent(); click=true; setTimeout(() => {click=false;}, 800);"
            :class="click ? 'bg-transparent' : 'dark:bg-accent text-primary-dark'">{{ __('me_str.copy_to_clipboard') }}</button>
        <div dir="ltr" id="type-2"
            class="h-fit overflow-x-auto whitespace-nowrap rounded-lg bg-primary-light p-4 dark:bg-primary-dark">
            {{ __('convert.final_output') }}
        </div>
    </div>
    @vite('resources/js/converts/convert.js')
</x-card>
