<div class="grid items-center justify-center gap-4 p-4">
    <form wire:submit="getTexts('', 1)">
        {{-- <input class="bg-gray-500 p-4" type="url" wire:model='url'> --}}
        <button class="bg-blue-400 p-4" type="submit" wire:key='get_texts'>Get
            Texts</button>
        <div class="border p-4">{{ json_encode($texts) }}</div>
    </form>
</div>
