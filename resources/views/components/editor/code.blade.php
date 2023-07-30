<div class="py-2 w-fit mx-auto">
    <div class="bg-secondary-light dark:bg-secondary-dark p-2 rounded-lg flex flex-wrap overflow-hidden"
        id="{{ $id }}" onclick="selectText('{{ $id }}')">
        <code dir="ltr" class="whitespace-pre-wrap p-4">{{ $slot }}</code>
    </div>
</div>
