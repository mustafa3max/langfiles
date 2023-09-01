<div x-data="{ select: true }" class="py-2">
    <div class="flex gap-4">
        <a x-on:click="select=true"
            class="block grow cursor-pointer rounded-t-lg bg-secondary-light px-8 py-4 text-center dark:bg-secondary-dark"
            :class="select ? 'font-bold' :
                'bg-opacity-50 dark:bg-opacity-50'">
            {{ __('convert.by_json_code') }}
        </a>
        <a x-on:click="select=false"
            class="block grow cursor-pointer rounded-t-lg bg-secondary-light px-8 py-4 text-center dark:bg-secondary-dark"
            :class="!select ? 'font-bold' :
                'bg-opacity-50 dark:bg-opacity-50 '">
            {{ __('convert.by_key_value') }}
        </a>
    </div>
    <div class="w-full whitespace-nowrap rounded-b-lg bg-secondary-light p-2 outline-0 dark:bg-secondary-dark">
        {{ $slot }}
    </div>
</div>
