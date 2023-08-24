<button class="rounded-lg text-xl uppercase hover:bg-accent hover:text-primary-dark dark:hover:bg-accent"
    onclick="addElement('{{ $type }}')">
    @switch($type)
        @case('h2')
            <i class="bi bi-type-h2 block p-2" title="Heading 2"></i>
        @break

        @case('h3')
            <i class="bi-type-h3 block p-2" title="Heading 3"></i>
        @break

        @case('p')
            <i class="bi-text-paragraph block p-2" title="Paragraph"></i>
        @break

        @case('i')
            <i class="bi-type-italic block p-2" title="italic"></i>
        @break

        @case('u')
            <i class="bi-type-underline block p-2" title="Underline"></i>
        @break

        @case('del')
            <i class="bi-type-strikethrough block p-2" title="Delete"></i>
        @break

        @case('sup')
            <i class="block p-2" title="Superscript">
                <x-svg.sup />
            </i>
        @break

        @case('sub')
            <i class="block p-2" title="Superscript">
                <x-svg.sub />
            </i>
        @break

        @case('img')
            <i class="bi-image block p-2" title="Image"></i>
        @break

        @case('a')
            <i class="block p-2" title="Link">
                <x-svg.link />
            </i>
        @break

        @case('ul')
            <i class="block p-2" title="Bulleted list">
                <x-svg.ul />
            </i>
        @break

        @case('ol')
            <i class="block p-2" title="Numeric list">
                <x-svg.ol />
            </i>
        @break

        @case('code')
            <i class="block p-2" title="Code">
                <x-svg.code />
            </i>
        @break

        @case('blockquote')
            <i class="block p-2" title="Block quote">
                <x-svg.blockquote />
            </i>
        @break

        @case('q')
            <i class="block p-2" title="quote">
                <x-svg.quote />
            </i>
        @break

        @default
            <i class="bi-type-bold block p-2" title="Text Bold"></i>
    @endswitch
</button>
