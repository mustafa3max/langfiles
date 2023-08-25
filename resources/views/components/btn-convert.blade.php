<button type="button" title="{{ $title ?? '' }}"
    class="h-12 grow rounded-lg border border-primary-light bg-primary-light p-2 uppercase hover:border-accent disabled:cursor-not-allowed disabled:bg-secondary-light disabled:hover:border-primary-light dark:border-primary-dark dark:bg-primary-dark dark:hover:border-accent dark:disabled:border-primary-dark disabled:dark:bg-secondary-dark"
    x-on:click="convertAll(convert, 7);convert[{{ $index }}]=true;" :disabled="convert[{{ $index }}]">
    {{ $slot }}
</button>

<script>
    function convertAll(converts, count) {
        for (let index = 0; index < count; index++) {
            converts[index] = false;
        }
    }
</script>
