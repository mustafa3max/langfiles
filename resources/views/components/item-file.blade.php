<div class="no-scrollbar bg-{{ $isType ? 'primary' : 'secondary' }}-light dark:bg-{{ $isType ? 'primary' : 'secondary' }}-dark relative grow cursor-pointer overflow-x-scroll rounded-lg border border-transparent hover:border-accent"
    x-data="{ isDelete: false }"
    x-on:click="isDelete?false:Object.keys(Alpine.store('group').meCode).includes('{{ $data[0] }}')?
         removeCode('{{ $data[0] }}',  {{ json_encode($languages) }}):
         addCode('{{ $data[0] }}','{{ json_encode($allData) }}', {{ json_encode($languages) }});
         countMeCode = countCode();Alpine.store('group').meCode=JSON.parse(localStorage.getItem('arCodeAll')) ?? {} ;
         csvData=JSON.parse(localStorage.getItem('arCodeAll')) ?? {} ;
         isSelectTab = Object.keys(Alpine.store('group').meCode).length > 0 ? [true, false] : []">

    <div wire:key='{{ $data[0] }}'>
        <div class="flex items-center gap-3 p-3" dir="ltr">
            <span class="font-semibold text-code-1-light dark:text-code-1-dark">{{ $data[0] }}</span>

            <div class="h-3 border-s"></div>

            <span class="font-semibold text-code-2-light dark:text-code-2-dark">{{ $data[1] }}</span>
            @if (!$isType)
                <div class="z-50 flex grow justify-end">
                    <button x-on:click="isDelete=true"
                        class="flex h-12 items-center justify-center rounded-lg p-4 hover:text-accent"
                        wire:click='delete("{{ $data[0] }}")' title="{{ __('me_str.remove_key') }}">
                        <x-svg.x />
                    </button>
                </div>
            @endif
        </div>
        @if ($isType)
            <div
                class="flex gap-2 rounded-lg border-x-4 border-b-4 border-primary-light bg-secondary-light p-3 pb-3 dark:border-primary-dark dark:bg-secondary-dark">
                <span class="font-semibold">{{ __('me_str.type') }}</span>
                <span class="font-extrabold">:</span>
                <span>{{ $type ?? '' }}</span>
            </div>
        @endif
    </div>

    <div class="absolute bottom-0 top-0 flex h-full w-full items-center justify-center rounded-lg border border-accent bg-primary-light bg-opacity-60 dark:bg-primary-dark dark:bg-opacity-60"
        x-show="Object.keys(Alpine.store('group').meCode).includes('{{ $data[0] }}')">
        <i class="text-accent">
            <x-svg.check />
        </i>
    </div>
</div>
