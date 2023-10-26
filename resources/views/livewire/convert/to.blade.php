<div class="grid gap-2">

    @section('page-title')
        {{ __('seo.title_convert') }}
    @endsection

    @section('page-description')
        {{ __('seo.description_convert') }}
    @endsection

    <x-card>
        <x-title>{{ __('seo.title_convert') }}</x-title>

        <div class="flex flex-wrap justify-center gap-2">
            <div class="flex flex-wrap gap-2" x-data="{
                extensions: {{ json_encode(Globals::supportedExtensions()) }},
                clicks: [false, false, false, false, false, false, false, false],
                error: null
            }">
                <template x-for="(extension, index) in extensions">
                    <button class="rounded-lg border border-primary-light px-2 py-1 uppercase dark:border-primary-dark"
                        x-text="extension"
                        x-on:click="window.convertNow(extension);clicks = [false, false, false, false, false, false, false,]; clicks[index]=true"
                        :class="clicks[index] ? '' : 'bg-primary-light dark:bg-primary-dark'"></button>
                </template>
            </div>
        </div>
    </x-card>

    <x-full-one>
        <div x-show="select" class="grid gap-2 p-2" x-data="{
            data: Alpine.store('syntax').tryCatch(),
        }">
            <label class="block">{{ __('convert.json_input') }}</label>
            <textarea oninput="auto_grow(this)" dir="ltr" id="type-1"
                class="min-h-[200px] w-full resize-none overflow-auto whitespace-pre-wrap rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark"
                @if ($dataTransQuery != null) x-text="JSON.stringify({{ $dataTransQuery }})" @else x-text="data" @endif
                placeholder="{{ __('convert.write_here') }}">
            </textarea>
            <div x-show="Alpine.store('syntax').error!=null" x-text="Alpine.store('syntax').error"
                class="pt-2 font-extrabold text-code-2-dark" dir="ltr"></div>
        </div>

        <div class="w-full" x-show="!select" x-data="{ syntaxesLocal: [] }">

            <x-input-key-value />

        </div>
    </x-full-one>

    <x-card>
        <div class="grid gap-2">
            <div class="flex flex-wrap gap-2">
                <button x-data="{ click: false }" class="w-fit rounded-lg bg-accent px-2 py-1 uppercase"
                    x-on:click="window.copyContent(); click=true; setTimeout(() => {click=false;}, 800);"
                    :class="click ? 'bg-transparent' : 'dark:bg-accent text-primary-light font-bold'">{{ __('me_str.copy_to_clipboard') }}</button>
                <div class="grow"></div>
                <button
                    class="w-fit rounded-lg border border-accent px-2 py-1 font-bold uppercase text-accent dark:border-accent"
                    x-on:click="window.delete()">{{ __('me_str.delete') }}</button>
            </div>
            <div dir="ltr" id="type-2"
                class="h-fit overflow-x-auto whitespace-nowrap rounded-lg bg-primary-light p-4 font-bold dark:bg-primary-dark">
                {{ __('convert.final_output') }}
            </div>
        </div>
    </x-card>

    <x-card>
        <div class="grid gap-2" x-data="{ isTransKeys: false, isTransValues: false }">
            <div class="grid gap-2 text-center">
                <h2 class="py-2 text-2xl font-bold">{{ __('me_str.title_trans_group') }}</h2>
                <p>{{ __('me_str.desc_trans_group') }}</p>
            </div>

            <x-is-trans-key-value />

            <button
                x-on:click="Livewire.dispatch('transNow', {data:{data:sessionStorage.getItem('convert_data'), isTransKeys: isTransKeys, isTransValues:isTransValues}})"
                class="rounded-lg border border-transparent bg-accent p-2 font-bold text-primary-light hover:border-accent hover:bg-transparent hover:text-accent">{{ __('me_str.trans_now') }}</button>
        </div>
    </x-card>

    <div wire:loading>
        <x-wite />
    </div>

    {{-- Message Not Name Group --}}
    <x-msg />

    @push('scripts')
        @vite(['resources/js/converts/convert.js'])

        <script data-navigate-track>
            var syntaxesLocal = [];

            document.addEventListener('alpine:init', () => {

                // Syntaxes
                window.Alpine.store('syntax', {
                    syntaxesLocal: [],
                    isSyntaxKey: false,
                    isSyntaxValue: false,
                    error: null,

                    selectSyntax(syntax, isKey, id) {
                        const input = document.getElementById(id);
                        input.value = window.selectSyntax(input.value, syntax);

                        setTimeout(() => {
                            input.setSelectionRange(input.value.length, input.value.length);
                            input.focus();
                        }, 250);
                    },

                    async tryCatch() {
                        try {
                            Alpine.store('syntax').error = null;
                            return JSON.stringify(JSON.parse(sessionStorage.getItem('convert_data')), null,
                                4);
                        } catch (e) {
                            if (sessionStorage.getItem('convert_data') != "") {
                                Alpine.store('syntax').error = e.message;
                            }
                            return sessionStorage.getItem('convert_data');
                        }

                    }
                });
            });


            document.addEventListener('livewire:init', () => {
                window.Livewire.on('dataTrans', data => {
                    sessionStorage.setItem('convert_data', data);
                });
            });

            document.addEventListener('livewire:initialized', () => {
                // Syntaxes
                const itemsSyntax = @this.syntaxes();
                itemsSyntax.then((value) => {
                    if (value == null) {
                        sessionStorage.removeItem('syntaxes');
                    } else {

                        sessionStorage.setItem('syntaxes', JSON.stringify(value));
                        Alpine.store('syntax').syntaxesLocal = JSON.parse(sessionStorage.getItem('syntaxes'));
                    }
                });
            });

            function auto_grow(element) {
                element.style.height = "5px";
                element.style.height = (element.scrollHeight) + "px";
            }
        </script>

        @vite(['resources/js/converts/convert.js'])
    @endpush

</div>
