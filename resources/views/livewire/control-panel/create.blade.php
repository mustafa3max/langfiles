<div dir="ltr">
    <div class="bg-secondary-light dark:bg-secondary-dark p-2 rounded-lg text-center text-lg font-bold flex">
        <h1 class="text-accent">Table Nmae: </h1>
        <h1 class="ps-2">{{ $type }}</h1>
    </div>
    <div class="pt-2"></div>


    <form
        class="bg-secondary-light dark:bg-secondary-dark p-2 rounded-lg grid grid-cols-1 gap-2"wire:submit.prevent='create'>
        <div class="grid gap-2">
            <div class="grid">
                <span class="pb-2">Key</span>
                <input type="text" class="p-4 bg-primary-light dark:bg-primary-dark rounded-lg w-full"
                    placeholder="Key" wire:model.lzy='key'>

                @error('key')
                    <span class="pt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid">
                <span class="pb-2">Value</span>
                <input type="text" class="p-4 bg-primary-light dark:bg-primary-dark rounded-lg w-full"
                    placeholder="Value" wire:model.lzy='value'>

                @error('value')
                    <span class="pt-2">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="">
            <button type="submit" class="bg-accent p-4 rounded-lg">Create Now</button>
        </div>
    </form>

    <div class="pt-2"></div>

    <div class="bg-secondary-light dark:bg-secondary-dark p-2 rounded-lg grid grid-cols-1 gap-2">
        @forelse ($data as $files)
            <div class="grid gap-2">
                <div class="p-2 bg-primary-light dark:bg-primary-dark rounded-lg grow">
                    <div class="grid">
                        <div
                            class="text-accent border-b border-secondary-light dark:border-secondary-dark text-center p-2">
                            Key</div>
                        <div class="p-6 ps-2">{{ $files->key }}</div>
                    </div>
                    <div class="grid">
                        <div
                            class="text-accent border-b border-t border-secondary-light dark:border-secondary-dark text-center p-2">
                            Value</div>
                        <div class="p-6 ps-2">{{ $files->value }}</div>
                    </div>
                </div>
            </div>
        @empty
        @endforelse
        {{ $data->links('vendor.livewire.simple-tailwind') }}

    </div>
</div>
