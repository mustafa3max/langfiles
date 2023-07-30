<div class="py-2 w-fit mx-auto">
    <div class="bg-secondary-light dark:bg-secondary-dark p-2 rounded-lg" id="{{ $id }}"
        onclick="selectText('{{ $id }}')">
        <pre dir="ltr"><code>{{ $slot }}</code></pre>
    </div>
</div>
