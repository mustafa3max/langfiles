<div dir="ltr">
    <div class="flex rounded-lg bg-secondary-light p-2 text-center text-lg font-bold dark:bg-secondary-dark">
        <h1 class="text-accent">Table Nmae: </h1>
        <h1 class="ps-2">{{ $type }}</h1>
    </div>
    <div class="pt-2"></div>


    <form
        class="grid grid-cols-1 gap-2 rounded-lg bg-secondary-light p-2 dark:bg-secondary-dark"wire:submit.prevent='create'>
        <div class="grid gap-2">
            <div class="grid">
                <span class="pb-2">Key</span>
                <input type="text" class="w-full rounded-lg bg-primary-light p-4 dark:bg-primary-dark"
                    placeholder="Key" wire:model.blur='key'>

                @error('key')
                    <span class="pt-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="grid">
                <span class="pb-2">Value</span>
                <input type="text" class="w-full rounded-lg bg-primary-light p-4 dark:bg-primary-dark"
                    placeholder="Value" wire:model.blur='value'>

                @error('value')
                    <span class="pt-2">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="">
            <button type="submit" class="rounded-lg bg-accent p-4">Create Now</button>
        </div>
    </form>

    <div class="pt-2"></div>

    <div class="grid grid-cols-1 gap-2 rounded-lg bg-secondary-light p-2 dark:bg-secondary-dark">
        @forelse ($data as $files)
            <div class="grid gap-2">
                <div class="grow rounded-lg bg-primary-light p-2 dark:bg-primary-dark">
                    <div class="grid">
                        <div
                            class="border-b border-secondary-light p-2 text-center text-accent dark:border-secondary-dark">
                            Key</div>
                        <div class="p-6 ps-2">{{ $files->key }}</div>
                    </div>
                    <div class="grid">
                        <div
                            class="border-b border-t border-secondary-light p-2 text-center text-accent dark:border-secondary-dark">
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
