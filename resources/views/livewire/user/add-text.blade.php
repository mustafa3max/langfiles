<div class="grid gap-2">
    @section('page-index')
        noindex
    @endsection

    @section('page-title')
        {{ __('seo.title_add_texts') }}
    @endsection

    @section('page-description')
        {{ __('seo.description_add_texts') }}
    @endsection

    <x-card>
        <x-title>{{ __('seo.title_add_texts') }}</x-title>
    </x-card>

    <x-card>
        <div class="grid grow gap-2">
            <h2 class="p-4 text-center text-lg font-bold">{{ __('me_str.group_name_title') }}</h2>
            <p class="grow py-2 text-center">
                {{ __('me_str.group_name_msg') }}</p>
            <div class="relative flex grow flex-wrap gap-2" x-data="{ isMeGroups: false }">
                <button
                    class="flex h-14 w-14 items-center justify-center rounded-lg bg-accent text-primary-dark hover:text-primary-light max-md:grow"
                    title="{{ __('me_str.me_groups') }}"
                    x-on:click="isMeGroups=Object.is(JSON.parse(sessionStorage.getItem('items_save')), null)?true:confirm('{{ __('me_str.msg_new_group') }}')"><x-svg.angles-down /></button>
                @if (!$isOldGroupQuery)
                    <input type="text" wire:model='groupName' id="group-name"
                        placeholder="{{ __('convert.write_here') }}"
                        class="grow rounded-lg bg-primary-light p-4 outline-0 dark:bg-primary-dark"
                        wire:key='group-name'>
                @else
                    <div type="text" wire:model='groupName' id="group-name"
                        class="h-14 grow rounded-lg border-2 border-primary-light p-4 outline-0 dark:border-primary-dark">
                        {{ $groupName }}
                    </div>
                @endif

                {{-- Select Group --}}
                @component('components.add_texts.me-groups', ['meGroupsQuery' => $meGroupsQuery])
                @endcomponent

                {{-- Languages --}}
                <ul class="flex gap-2 max-md:grow">
                    @foreach (Globals::languages() as $lang)
                        <li class="grow">
                            @if ($langSelectQuery != $lang)
                                <button wire:click='langSelect("{{ $lang }}")' wire:key='{{ $lang }}'
                                    class="h-14 w-full rounded-lg bg-primary-light px-4 hover:bg-accent hover:text-primary-dark dark:bg-primary-dark dark:hover:bg-accent">{{ __('lang.' . $lang) }}</button>
                            @else
                                <button wire:click='' wire:key='{{ $lang }}'
                                    class="h-14 w-full cursor-not-allowed rounded-lg border-2 border-primary-light bg-transparent px-4 dark:border-primary-dark">{{ __('lang.' . $lang) }}</button>
                            @endif

                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </x-card>

    <x-card>
        {{-- Translate Keys --}}
        @if ($langSelectQuery == 'ar')
            <div
                class="mb-2 flex items-center gap-2 rounded-lg border-2 border-primary-light p-2 dark:border-primary-dark">
                <button wire:click='isTrans(true)'
                    class="{{ $isTransKeys ? 'bg-accent text-primary-dark' : 'bg-primary-light dark:bg-primary-dark' }} block rounded-lg p-2">{{ __($isTransKeys ? 'me_str.disabled' : 'me_str.enabled') }}</button>
                <p class="grow py-2 text-start">
                    {{ __('me_str.message_add_text_keys') }}</p>
                @if ($isTransKeys)
                    <span class="text-accent">
                        <x-svg.check />
                    </span>
                @else
                    <x-svg.x />
                @endif
            </div>
            <div
                class="mb-2 flex items-center gap-2 rounded-lg border-2 border-primary-light p-2 dark:border-primary-dark">
                <button wire:click='isTrans(false)'
                    class="{{ $isTransValues ? 'bg-accent text-primary-dark' : 'bg-primary-light dark:bg-primary-dark' }} block rounded-lg p-2">{{ __($isTransValues ? 'me_str.disabled' : 'me_str.enabled') }}</button>
                <p class="grow py-2 text-start">
                    {{ __('me_str.message_add_text_values') }}</p>
                @if ($isTransValues)
                    <span class="text-accent">
                        <x-svg.check />
                    </span>
                @else
                    <x-svg.x />
                @endif
            </div>
        @endif

        <div class="w-full" x-data="{ syntaxesLocal: [] }">
            <x-input-key-value />
        </div>

    </x-card>

    <x-card>
        {{-- Edit Text --}}
        <div class="relative grid gap-2" x-data="{ items: $store.items.items, on: true }">
            <h2 class="p-4 text-center text-lg font-bold">{{ __('me_str.adding_texts_not_publish') }}</h2>
            <p class="py-2">{{ __('me_str.check_publishing') }}</p>
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

            <div id="save-done"
                class="absolute bottom-0 left-0 right-0 top-0 hidden items-center justify-center rounded-lg bg-secondary-light bg-opacity-70 dark:bg-secondary-dark dark:bg-opacity-70">
                <div
                    class="flex w-fit items-center gap-2 rounded-full border border-accent bg-primary-light p-4 shadow-lg dark:bg-primary-dark">
                    {{ __('me_str.save_done') }}
                    <x-svg.check />
                </div>
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

    <div wire:loading.delay wire:target="publish">
        <x-wite />
    </div>

    <x-msg />

    <script>
        var syntaxesLocal = [];

        document.addEventListener('alpine:init', () => {
            Alpine.store('items', {
                items: JSON.parse(sessionStorage.getItem('items_save') ?? '{}'),
                on: false,
                init() {
                    this.on = Object.keys(this.items ?? {}).length > 0;
                }
            });

            // Syntaxes
            Alpine.store('syntax', {
                syntaxesLocal: [],
                isSyntaxKey: false,
                isSyntaxValue: false,

                selectSyntax(syntax, isKey, id) {
                    const input = document.getElementById(id);
                    input.value = window.selectSyntax(input.value, syntax);

                    setTimeout(() => {
                        input.setSelectionRange(input.value.length, input.value.length);
                        input.focus();
                    }, 250);
                }
            });
        });

        document.addEventListener('livewire:init', function() {
            Livewire.on('clearInputs', isClaer => {
                if (isClaer) {
                    window.removeAll('remove');
                } else {
                    alert('يوجد خطأ ما لم يتم حفظ البيانات');
                }
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
                }
            });
            //
            const items = @this.selectGroup(@this.groupName);
            items.then((value) => {
                if (value != null && (sessionStorage.getItem('items_save') ?? '{}') === value) {
                    sessionStorage.setItem('items_save', value);
                    Alpine.store('items').items = JSON.parse(value);
                    Alpine.store('items').on = Object.keys(Alpine.store('items').items ?? {}).length > 0;
                }
            });
            //
            @this.groupName = sessionStorage.getItem('group_name');

            //
            @this.on('changeGroupName', data => {
                const group = data.group;

                sessionStorage.setItem('group_name', group);
                const items = @this.selectGroup(group);

                items.then((value) => {

                    if (value != '') {
                        sessionStorage.setItem('items_save', value);
                        const data = JSON.parse(value);
                        Alpine.store('items').items = data;
                        Alpine.store('items').on = Object.keys(data ?? {}).length > 0;
                    }

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
