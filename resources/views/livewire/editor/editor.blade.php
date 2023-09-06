<div class="relative" x-data="{ count: 10 }">
    <x-editor.nav />
    <x-editor.info-img />
    <x-editor.info-link />
    <div class="mx-auto grid gap-1 p-1">
        <div class="rounded-lg">
            <form wire:submit.prevent="publishArticle" class="container mx-auto">
                {{-- Thumbnail --}}
                <div>
                    <span class="block pb-2">{{ __('me_str.thumbnail') }}</span>
                    <img src="{{ asset($blog->thumbnail ?? '') }}" alt="{{ $title ?? '' }}" id="thumbnail-article"
                        ondblclick="infoImage(this.src, this.id)" class="mb-2 w-80" contenteditable>
                    <input type="hidden" wire:model.blur='blog.thumbnail'
                        class="w-full rounded-lg bg-secondary-light p-2 outline-none dark:bg-secondary-dark">
                </div>
                {{-- Title --}}
                <div class="grow">
                    <span class="block pb-2">{{ __('me_str.title') }}</span>
                    <input type="text"
                        class="w-full rounded-lg bg-secondary-light p-2 outline-none dark:bg-secondary-dark"
                        id="title" wire:model.blur='blog.title' required>
                    @error('blog.title')
                        <p class="pt-3 text-center text-sm text-accent">{{ $message }}</p>
                    @enderror
                </div>
                {{-- Desc --}}
                <div class="grow">
                    <span class="block pb-2">{{ __('me_str.desc') }}</span>
                    <textarea rows="3" class="w-full rounded-lg bg-secondary-light p-2 outline-none dark:bg-secondary-dark"
                        id="desc" wire:model.blur='blog.desc' required></textarea>
                    @error('blog.desc')
                        <p class="pt-3 text-center text-sm text-accent">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Article --}}
                <div>
                    <span class="block pb-2">{{ __('me_str.article') }}</span>
                    <div id="article"
                        class="min-h-screen w-full rounded-lg bg-secondary-light p-2 outline-none dark:bg-secondary-dark"
                        contenteditable="true">
                        {!! $blog->article !!}
                    </div>
                    <input wire:model.blur='blog.article' type="hidden">
                    @error('blog.article')
                        <p class="pt-3 text-center text-sm text-accent">{{ $message }}</p>
                    @enderror
                </div>
            </form>
        </div>
    </div>

    <script>
        window.addEventListener('image', event => {
            @this.set('blog.thumbnail', event.detail.src);
        });

        article.addEventListener('focus', event => {
            // @this.save = event.target.innerHTML.trim() !== @this.blog.article.trim();
            @this.save = false;
        });

        article.addEventListener('focusout', event => {
            if (@this.blog.article.trim() != event.target.innerHTML.trim()) {
                @this.set('blog.article', event.target.innerHTML);
            }
        });

        const observer = new window.MutationObserver(function(event) {
            if (@this.blog.article.trim() != event[0].target.innerHTML.trim()) {
                @this.set('blog.article', event[0].target.innerHTML);
            }
        });

        observer.observe(article, {
            childList: true,
        });
    </script>

</div>
