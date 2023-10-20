<ul class="flex flex-wrap justify-center gap-2">
    <template x-for="lang in Alpine.store('langtool').languages">
        <li><button x-text="lang" class="rounded-lg p-2 hover:bg-accent"
                x-on:click="Alpine.store('langtool').lang=lang; setTimeout(function() {$dispatch('notify')}, 20);"
                :class="Alpine.store('langtool').lang === lang ? 'bg-accent font-extrabold text-primary-dark' : ''"></button>
        </li>
    </template>
</ul>
