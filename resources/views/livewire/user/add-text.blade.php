<div class="grid gap-2">
    @section('page-title')
        {{ __('seo.title_add_texts') }}
    @endsection
    @section('page-description')
        {{ __('seo.description_add_texts') }}
    @endsection
    <x-card>
        <div class="">
            <x-title value="{{ __('seo.title_add_texts') }}" />
            <x-card-dark>
                <ul class="flex gap-2 overflow-x-auto overflow-y-hidden">
                    @foreach (Globals::languages() as $lang)
                        <li><button wire:click='langSelect("{{ $lang }}")'
                                class="{{ $langSelect === $lang ? 'dark:border-secondary-dark border-secondary-light' : 'dark:bg-secondary-dark bg-secondary-light border-transparent' }} rounded-lg border px-2 py-1 hover:bg-accent hover:text-primary-dark dark:hover:bg-accent">{{ __('lang.' . $lang) }}</button>
                        </li>
                    @endforeach
                </ul>
            </x-card-dark>
        </div>
    </x-card>

    <x-card>
        <div class="flex flex-wrap items-end gap-2">
            <div class="grid grow gap-2">
                <label class="block">{{ __('me_str.key') }}</label>
                <input type="text" id="key" placeholder="{{ __('convert.write_here') }}"
                    class="rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark">
            </div>

            <button x-on:click="window.add()"
                class="mb-1 flex h-12 w-12 items-center justify-center rounded-full bg-accent"
                title="{{ __('convert.add') }}"><x-svg.add /></button>

            <div class="grid grow gap-2">
                <label class="block">{{ __('me_str.value') }}</label>
                <input type="text" id="value" placeholder="{{ __('convert.write_here') }}"
                    class="rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark">
            </div>
        </div>
    </x-card>

    <x-card>
        <div class="grid gap-2">
            <h2 class="p-4 text-center text-lg font-bold">{{ __('me_str.adding_texts_not_publish') }}</h2>
            <p class="py-2 text-base">{{ __('me_str.check_publishing') }}</p>
            <div id="all-texts" class="grid gap-2" x-show="$store.items.on">
                <template x-for="(key, index) in Object.keys($store.items.items)">
                    <div
                        class="flex flex-wrap items-center gap-2 rounded-lg border-2 border-primary-light p-2 font-extrabold dark:border-primary-dark md:justify-center">
                        <span class="block text-center max-md:grow" x-text="index+1"></span>
                        <input type="text" :id="'key-' + index" placeholder="{{ __('me_str.key') }}"
                            :name="key" :value="key"
                            class="h-14 grow rounded-lg bg-primary-light p-4 text-code-2-light outline-0 dark:bg-primary-dark dark:text-code-2-dark">
                        <input type="text" :id="'value-' + index" placeholder="{{ __('me_str.value') }}"
                            :name="$store.items.items[key]" :value="$store.items.items[key]"
                            class="h-14 grow rounded-lg bg-primary-light p-4 text-code-1-light outline-0 dark:bg-primary-dark dark:text-code-1-dark">
                        <button x-on:click="window.save(key, $store.items.items[key])"
                            class="flex h-14 items-center justify-center rounded-lg border border-accent text-accent hover:border-transparent hover:bg-primary-light hover:dark:bg-primary-dark max-md:grow md:w-14"
                            title="{{ __('me_str.save') }}"><x-svg.save /></button>
                        <button x-on:click="remove(key)"
                            class="flex h-14 w-14 items-center justify-center rounded-lg hover:bg-primary-light hover:text-accent hover:dark:bg-primary-dark"
                            title="{{ __('me_str.delete') }}"><x-svg.x /></button>
                    </div>
                </template>
            </div>
            <div x-show="!$store.items.on">
                <x-empty isReload="{{ false }}" />
            </div>
        </div>
    </x-card>

    <div class="flex flex-wrap gap-2">
        <button x-on:click='$wire.publish($store.items.items)'
            class="flex grow items-center justify-center gap-4 rounded-lg bg-accent p-2 font-bold text-primary-dark">
            <x-svg.publish />
            {{ __('me_str.publish_now') }}
        </button>
        <button onclick="window.removeAll()"
            class="flex items-center justify-center gap-4 rounded-lg border border-accent p-2 font-bold text-accent">
            {{ __('me_str.remove_all') }}
        </button>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('items', {
                items: JSON.parse(sessionStorage.getItem('items_save') ?? '{}'),
                on: false,
                init() {
                    this.on = Object.keys(this.items).length > 0;
                }
            });
        });
    </script>

    @vite('resources/js/user/add_texts.js')

</div>
