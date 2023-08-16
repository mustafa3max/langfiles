@php
    $keys = [];
@endphp
@foreach (array_values($file) as $f)
    @foreach ($f as $l)
        @php
            if ($l->key == $data->key) {
                $keys[] = $l->value;
            }
        @endphp
    @endforeach
@endforeach
<div x-data="{ isDelete: false }"
    class="no-scrollbar bg-{{ $isType ? 'primary' : 'secondary' }}-light dark:bg-{{ $isType ? 'primary' : 'secondary' }}-dark relative grow cursor-pointer overflow-x-scroll rounded-lg border border-transparent hover:border-accent"
    :title="Object.keys(meCode).includes('{{ $data->key }}') ? '{{ __('me_str.selected') }}' :
        '{{ __('me_str.select') }}'"
    x-on:click="isDelete?false:Object.keys(meCode).includes('{{ $data->key }}')?
         removeCode('{{ $data->key }}',  ['{{ Globals::languages()[0] }}','{{ Globals::languages()[1] }}']):
         addCode('{{ $data->key }}','{{ json_encode($keys) }}', ['{{ Globals::languages()[0] }}','{{ Globals::languages()[1] }}']);
         countMeCode = countCode();meCode=JSON.parse(localStorage.getItem('arCodeAll')) ?? {} ;
         isSelectTab = Object.keys(meCode).length > 0 ? [true, false] : []">

    <div wire:key='{{ $data->language . $data->key }}'>

        <div class="flex items-center gap-3 p-3" dir="ltr">
            <span class="font-semibold text-code-1-light dark:text-code-1-dark">{{ $data->key }}</span>

            <div class="h-3 border-s"></div>

            <span class="font-semibold text-code-2-light dark:text-code-2-dark">{{ $data->value }}</span>
            @if (!$isType)
                <div class="z-50 flex grow justify-end">
                    <button x-on:click="isDelete=true"
                        class="flex h-12 items-center justify-center rounded-lg p-4 hover:text-accent"
                        wire:click='delete("{{ $data->key }}")' title="{{ __('me_str.remove_key') }}"><i
                            class="fa-solid fa-xmark"></i></button>
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

    <div class="absolute bottom-0 top-0 flex h-full w-full items-center justify-center bg-primary-light bg-opacity-60 dark:bg-primary-dark dark:bg-opacity-60"
        x-show="Object.keys(meCode).includes('{{ $data->key }}')">
        <i class="fa-solid fa-check fa-2xl text-accent"></i>
    </div>

</div>
