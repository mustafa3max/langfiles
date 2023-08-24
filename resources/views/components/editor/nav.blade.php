<nav class="sticky top-0 z-50 bg-secondary-light p-1 dark:bg-secondary-dark">
    <div class="container mx-auto flex flex-wrap gap-1">
        <x-editor.btn-nav type="h2" />
        <x-editor.btn-nav type="h3" />
        <x-editor.btn-nav type="p" />
        <x-editor.btn-nav type="b" />
        <x-editor.btn-nav type="i" />
        <x-editor.btn-nav type="u" />
        <x-editor.btn-nav type="del" />
        <x-editor.btn-nav type="sub" />
        <x-editor.btn-nav type="sup" />
        <x-editor.btn-nav type="img" />
        <x-editor.btn-nav type="a" />
        <x-editor.btn-nav type="ul" />
        <x-editor.btn-nav type="ol" />
        <x-editor.btn-nav type="code" />
        <x-editor.btn-nav type="q" />
        <x-editor.btn-nav type="blockquote" />
        <div class="grow"></div>
        <button disabled class="{{ $this->save ? 'text-primary-light text-opacity-50' : 'text-accent' }}"
            title="{{ __('me_str.save') }}"><i class="fa-solid fa-floppy-disk fa-xl"></i></button>
    </div>
</nav>
