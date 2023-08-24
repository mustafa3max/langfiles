<div id="img-info"
    class="no-scrollbar fixed hidden h-full w-full items-center justify-center overflow-auto bg-primary-light dark:bg-primary-dark">
    <button
        class="start-0 top-0 ms-4 mt-4 flex h-12 w-12 items-center justify-center rounded-lg border border-accent text-accent hover:bg-accent hover:text-primary-dark"
        onclick="infoImage()"><x-svg.x /></button>
    <div class="">
        <div class="m-4 flex items-center gap-4 rounded-lg border border-secondary-light p-4 dark:border-secondary-dark">
            <span>Alt Image</span>
            <input type="text" class="rounded-lg bg-secondary-light p-2 outline-none dark:bg-secondary-dark"
                placeholder="alt" id="input-alt">
        </div>
        <div class="m-4 rounded-lg border border-secondary-light p-4 dark:border-secondary-dark">
            @livewire('editor.images')
        </div>
    </div>
</div>
