<div class="p-2">
    <div class="flex flex-wrap">
        <div class="min-w-[49.8%]">
            <h3 class="text-lg">Input</h3>
            <textarea wire:model.live="markdown"
                class="block h-screen w-full rounded-lg border-4 border-secondary-light bg-transparent p-2 outline-0 dark:border-secondary-dark"></textarea>
        </div>
        <div class="w-[0.4%]"></div>
        <div class="min-w-[49.8%]">
            <h3 class="text-lg">Output</h3>
            <div class="h-screen w-full rounded-lg bg-secondary-light p-2 dark:bg-secondary-dark">
                @markdom($markdown)
            </div>
        </div>
    </div>
</div>
