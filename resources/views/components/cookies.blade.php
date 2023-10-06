<div x-data="{ okPolicy: false }" x-show="!okPolicy"
    class="fixed bottom-0 w-full border-t-4 border-accent bg-secondary-light bg-opacity-80 p-8 dark:bg-secondary-dark dark:bg-opacity-80">
    <div class="mx-auto w-full md:w-9/12 lg:w-8/12 xl:w-6/12">
        <div class="grid items-start justify-start gap-4">
            <button class="cursor-pointer py-4 font-extrabold text-accent"
                x-on:click="okPolicy=true">{{ __('me_str.close') }}</button>
            <p>dsdsdss</p>
        </div>
    </div>
</div>
