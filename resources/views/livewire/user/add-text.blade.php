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
        <div class="grid grow gap-2">
            <h2 class="p-4 text-center text-lg font-bold">{{ __('me_str.group_name_title') }}</h2>
            <p class="grow py-2 text-center font-bold">
                {{ __('me_str.group_name_msg') }}</p>
            <div class="relative flex gap-2" x-data="{ isMeGroups: false }">
                <button
                    class="flex h-14 w-14 items-center justify-center rounded-lg bg-accent text-primary-dark hover:text-primary-light"
                    title="{{ __('me_str.me_groups') }}"
                    x-on:click="isMeGroups=!isMeGroups"><x-svg.angles-down /></button>
                <input type="text" wire:model.prevent='groupName' id="group-name"
                    placeholder="{{ __('convert.write_here') }}"
                    class="grow rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark">
                @component('components.add_texts.me-groups', ['meGroups' => $meGroups])
                @endcomponent
            </div>
        </div>
    </x-card>

    <x-card>
        @if ($langSelect == 'ar')
            <div class="flex items-center gap-2 rounded-lg border-2 border-primary-light p-2 dark:border-primary-dark">
                <button wire:click='isTrans()'
                    class="{{ $isTrans ? 'bg-accent text-primary-dark' : 'bg-primary-light dark:bg-primary-dark' }} block rounded-lg p-2">{{ __($isTrans ? 'me_str.disabled' : 'me_str.enabled') }}</button>
                <p class="grow py-2 text-start font-bold">
                    {{ __('me_str.message_add_text') }}</p>
                @if ($isTrans)
                    <span class="text-accent">
                        <x-svg.check />
                    </span>
                @else
                    <x-svg.x />
                @endif
            </div>
        @endif

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
        <div class="grid gap-2" x-data="{ items: $store.items.items, on: true }">
            <h2 class="p-4 text-center text-lg font-bold">{{ __('me_str.adding_texts_not_publish') }}</h2>
            <p class="py-2 text-base">{{ __('me_str.check_publishing') }}</p>
            <div id="all-texts" class="grid gap-2" x-show="$store.items.on">
                <template x-for="(key, index) in Object.keys($store.items.items??{})">
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
                        <button x-on:click="window.remove(key)"
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

    <div wire:loading wire:target="publish">
        <div
            class="fixed bottom-0 left-0 right-0 top-0 flex items-center justify-center rounded-lg bg-primary-light bg-opacity-90 p-8 dark:bg-primary-dark dark:bg-opacity-90">
            <div class="grid items-center justify-center gap-4 p-4">
                <div class="flex">
                    <div class="grow"></div>
                    <img src="{{ asset('assets/images/loading.gif') }}" alt="loading" class="block w-14">
                    <div class="grow"></div>
                </div>
                <div class="animate-bounce text-xl font-extrabold">
                    {{ __('me_str.please_wait') }}
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('items', {
                items: JSON.parse(sessionStorage.getItem('items_save') ?? '{}'),
                on: false,
                init() {
                    this.on = Object.keys(this.items ?? {}).length > 0;
                }
            });
        });

        document.addEventListener('livewire:load', function() {
            Livewire.on('clearInputs', isClaer => {
                if (isClaer) {
                    window.removeAll('{{ __('me_str.msg_save_data') }}');
                } else {
                    alert('يوجد خطأ ما لم يتم حفظ البيانات');
                }
            });

            @this.groupName = sessionStorage.getItem('group_name');
            const items = @this.selectGroup(sessionStorage.getItem('group_name'));

            items.then((value) => {
                if (value != null && (sessionStorage.getItem('items_save') ?? '{}') === value) {
                    sessionStorage.setItem('items_save', value);
                    Alpine.store('items').items = JSON.parse(value);
                    Alpine.store('items').on = Object.keys(Alpine.store('items').items ?? {}).length > 0;
                }
            });

            Livewire.on('changeGroupName', group => {
                const items = @this.selectGroup(group);

                items.then((value) => {
                    sessionStorage.setItem('items_save', value);
                    const data = JSON.parse(value);
                    Alpine.store('items').items = data;
                    Alpine.store('items').on = Object.keys(data ?? {}).length > 0;

                }).catch((err) => {
                    sessionStorage.removeItem('items_save');
                    sessionStorage.removeItem('group_name');
                    Alpine.store('items').items = {};
                    Alpine.store('items').on = false;
                });
            });
        });
    </script>

    @vite('resources/js/user/add_texts.js')

</div>
