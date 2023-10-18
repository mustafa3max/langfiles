<ul class="flex flex-wrap justify-center gap-2">
    <template x-for="lang in Alpine.store('langtool').languages">
        <li><button x-text="lang" class="p-2 hover:text-accent"></button></li>
    </template>
</ul>
