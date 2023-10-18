<ul class="flex flex-wrap justify-center gap-2 p-2">
    <template x-for="file in Alpine.store('langtool').files">
        <li><button x-text="file" class="rounded-lg p-2 hover:bg-accent"
                x-on:click="Alpine.store('langtool').file=file; Alpine.store('langtool').lang=file.split('.')[0]"
                :class="Alpine.store('langtool').file === file ? 'bg-accent font-extrabold text-primary-dark' : ''"></button>
        </li>
    </template>
</ul>
