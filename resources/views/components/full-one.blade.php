<div x-data="{ select: true }" class="py-2">
    <div class="flex gap-4">
        <a x-on:click="select=true"
            class="block grow cursor-pointer rounded-t-lg bg-primary-light px-8 py-4 text-center dark:bg-primary-dark"
            :class="select ? 'font-bold' :
                'bg-opacity-50 dark:bg-opacity-50 border-b-2 border-primary-light p-2 dark:border-primary-dark'">
            {{ __('convert.by_json_code') }}
        </a>
        <a x-on:click="select=false"
            class="block grow cursor-pointer rounded-t-lg bg-primary-light px-8 py-4 text-center dark:bg-primary-dark"
            :class="!select ? 'font-bold' :
                'bg-opacity-50 dark:bg-opacity-50 border-b-2 border-primary-light p-2 dark:border-primary-dark'">
            {{ __('convert.by_key_value') }}
        </a>
    </div>
    <div class="w-full whitespace-nowrap rounded-b-lg bg-primary-light p-2 outline-0 dark:bg-primary-dark">
        {{ $slot }}
    </div>
</div>
