<button type="button"
    class="h-12 grow rounded-lg border border-primary-light bg-primary-light p-2 uppercase hover:border-accent disabled:cursor-not-allowed disabled:bg-secondary-light disabled:hover:border-primary-light dark:border-primary-dark dark:bg-primary-dark dark:hover:border-accent dark:disabled:border-primary-dark disabled:dark:bg-secondary-dark"
    x-on:click="convert[0]=false; convert[1]=false; convert[2]=false; convert[3]=false; convert[4]=false;convert[5]=false;convert[{{ $index }}]=true;"
    :disabled="convert[{{ $index }}]">
    {{ $slot }}
</button>
