<div id="add-link"
    class="no-scrollbar fixed hidden h-full w-full items-center justify-center overflow-auto bg-primary-light dark:bg-primary-dark">
    <button
        class="start-0 top-0 ms-4 mt-4 flex h-12 w-12 items-center justify-center rounded-lg border border-accent text-accent hover:bg-accent hover:text-primary-dark"
        onclick="infoLink()"><x-svg.x /></button>
    <div class="">
        <div class="m-4 flex items-center gap-4 rounded-lg border border-secondary-light p-4 dark:border-secondary-dark">
            <label>Link</label>
            <input type="text" class="rounded-lg bg-secondary-light p-2 outline-none dark:bg-secondary-dark"
                placeholder="link" id="input-link" dir="ltr">
        </div>
        <div
            class="m-4 flex items-center gap-4 rounded-lg border border-secondary-light p-4 dark:border-secondary-dark">
            <div class="flex gap-4">
                <label for="input-nofollow">Nofollow</label>
                <input type="checkbox" class="rounded-lg bg-secondary-light p-2 outline-none dark:bg-secondary-dark"
                    placeholder="link" id="input-nofollow" dir="ltr">
            </div>
            <div class="h-12 border-s border-secondary-light dark:border-secondary-dark"></div>
            <div class="flex gap-4">
                <label for="input-new-window">فتح في نافذة جديدة</label>
                <input type="checkbox" class="rounded-lg bg-secondary-light p-2 outline-none dark:bg-secondary-dark"
                    placeholder="link" id="input-new-window" dir="ltr">
            </div>
        </div>
    </div>
</div>
