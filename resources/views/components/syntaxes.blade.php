<ul
    class="grid max-h-96 items-start overflow-y-auto rounded-lg bg-primary-light p-4 shadow-lg shadow-secondary-light dark:bg-primary-dark dark:shadow-secondary-dark">
    <template x-for="(syntax, index) in Alpine.store('syntax').syntaxesLocal">
        <li x-on:click="$store.syntax.selectSyntax(syntax, '{{ $iskey }}', '{{ $id }}')"
            class="block w-full cursor-pointer border-secondary-light py-2 text-start hover:text-accent dark:border-secondary-dark"
            x-text="syntax" :class="($store.syntax.syntaxesLocal.length == index + 1) ? 'border-none' : 'border-b'"></li>
    </template>
    <div class="p-4" x-show="$store.syntax.syntaxesLocal.length==0">{{ __('me_str.no_data') }}</div>

</ul>
