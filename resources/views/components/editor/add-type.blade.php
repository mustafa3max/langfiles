<div class="flex" id="'{{ $id }}'" x-data="{ isType: false }" x-on:click.outside="isType = false">
    <div class="grow"></div>

    <div class="flex flex-wrap items-center justify-center gap-4 rounded-lg bg-primary-light p-4 dark:bg-primary-dark">
        <button class="hover:text-accent" x-on:click="isType=true" x-show="!isType"><x-svg.add /></button>
        <div class="flex flex-wrap items-center justify-center gap-4" x-show="isType">
            <button class="block hover:text-accent"
                x-on:click="isType=false; window.addWidget('h2', '{{ $id }}')"
                id="h2"><x-svg.h2 /></button>
            <button class="block hover:text-accent"
                x-on:click="isType=false; window.addWidget('h3', '{{ $id }}')"
                id="h3"><x-svg.h3 /></button>
        </div>
    </div>

    <div class="grow"></div>
</div>
