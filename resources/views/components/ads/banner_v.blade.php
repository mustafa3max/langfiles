<div class="h-full w-full pt-2 md:ps-2 md:pt-0" id="ad-box-right">
    <div class="grid gap-2">
        <div class="hidden">
            <x-card>
                <div id="banner-right" class="rounded-lg bg-secondary-light p-4 dark:bg-secondary-dark">

                </div>
            </x-card>
        </div>

        @livewire('side.new-types')
        <x-side.supported-extensions />
        <x-side.tools />

        @livewire('side.latest-articles')
        <x-side.related-topics />
        <x-side.related-videos />
    </div>
</div>
