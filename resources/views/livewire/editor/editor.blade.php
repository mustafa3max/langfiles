<div class="relative" x-data="{ count: 10 }">
    <x-editor.nav />
    <div id="value"
        class="p-2 fixed bg-primary-light dark:bg-primary-dark w-full h-full items-center justify-center hidden">
        <div id="imgSrc">
            @livewire('editor.images')
        </div>

        <input type="text" class="bg-secondary-light dark:bg-secondary-dark rounded-lg p-2 outline-none hidden"
            id="imgAlt" placeholder="alt">
    </div>
    <div class="p-2 grid gap-2 container mx-auto">
        <div class="border border-secondary-light dark:border-secondary-dark rounded-lg p-2">
            <span class="pb-2 block">{{ __('me_str.thumbnail') }}</span>
            <img src="{{ asset('/storage/blog/images/temporary_image.png') }}" alt="" id="thumbnail"
                ondblclick="addSrc('', 'thumbnail')" class="w-full mb-2" contenteditable wire:model.defer='thumbnail'>
            <form>
                <span class="pb-2 block">{{ __('me_str.title') }}</span>
                <input type="text"
                    class="bg-secondary-light dark:bg-secondary-dark rounded-lg p-2 w-full outline-none" id="title"
                    wire:model.defer='title'>
                <span class="py-2 block">{{ __('me_str.desc') }}</span>
                <textarea rows="3" class="bg-secondary-light dark:bg-secondary-dark rounded-lg p-2 w-full outline-none"
                    id="desc" wire:model.defer='desc'></textarea>
            </form>
            <span class="pb-2 block">{{ __('me_str.article') }}</span>
            <div class="bg-secondary-light dark:bg-secondary-dark rounded-lg p-4 w-full">
                <div id="article" wire:model.defer='article'>
                </div>
            </div>
            <div class="p-1"></div>
            <div class="flex gap-4">
                <button
                    class="bg-accent hover:text-primary-light dark:hover:text-primary-light p-2 rounded-lg uppercase"
                    onclick='addItem()'>add</button>
                <button
                    class="hover:bg-accent dark:hover:bg-accent hover:text-primary-dark bg-secondary-light dark:bg-secondary-dark p-2 rounded-lg uppercase"
                    wire:click='publishArticle'>publish
                    article</button>
            </div>
        </div>
    </div>
</div>
