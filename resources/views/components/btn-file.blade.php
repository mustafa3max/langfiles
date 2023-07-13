<div x-data="{ isTooltip: false }" x-on:mouseleave="isTooltip = false" class="relative">
    <button class="rounded-lg border border-accent text-accent hover:text-secondary-light hover:bg-accent w-32 h-14"
        x-on:mouseover="isTooltip=true">
        <i class="fa-solid fa-{{ $icon }} fa-xl"></i>
    </button>
    <div x-show="isTooltip"
        class="absolute -top-14 start-0 end-0 z-10 px-4 font-medium text-accent duration-300 bg-secondary-light dark:bg-secondary-dark rounded-lg shadow-sm h-14 w-full flex items-center justify-center border">
        {{ $text }}
    </div>
</div>
