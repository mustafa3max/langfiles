<div dir="ltr">
    <div class="grid grid-cols-1 gap-2 rounded-lg bg-secondary-light p-2 dark:bg-secondary-dark">
        @php
            $index = -1;
        @endphp
        @forelse ($dataAll as $files)
            @php
                $index++;
                $this->isForm[] = false;
                $this->isDelete[] = false;
            @endphp
            <div class="flex items-center gap-2">
                <button class="hover:underline"
                    wire:click='isDelete({{ $files->id }}, {{ $index }})'>Delete</button>
                <div class="grid grow gap-2">
                    <div
                        class="{{ $files->enabled ? '' : 'border' }} grow rounded-lg border-accent bg-primary-light p-2 dark:bg-primary-dark">
                        <div class="grid">
                            <div
                                class="border-b border-secondary-light p-2 text-center text-accent dark:border-secondary-dark">
                                Key</div>
                            <div class="flex p-6 ps-2" wire:key='key_{{ $files->id }}'>
                                <span class="grow">{{ $files->key }}</span>
                                @if ($this->isForm[$index])
                                    <button type="button" wire:click="close(0)"
                                        class="text-accent hover:underline">Close</button>
                                @else
                                    <button type="button"
                                        wire:click="isUpdate('{{ $files->key }}', 0, '{{ $files->id }}', {{ $index }})"
                                        class="text-accent hover:underline">Update</button>
                                @endif
                            </div>
                        </div>
                        <div class="grid">
                            <div
                                class="border-b border-t border-secondary-light p-2 text-center text-accent dark:border-secondary-dark">
                                Value</div>
                            <div class="flex p-6 ps-2" wire:key='close_value_{{ $files->id }}'>
                                <span class="grow">{{ $files->value }}</span>
                                @if ($this->isForm[$index])
                                    <button type="button" wire:click="close(0)"
                                        class="text-accent hover:underline">Close</button>
                                @else
                                    <button type="button"
                                        wire:click="isUpdate('{{ $files->value }}', 0, '{{ $files->id }}', {{ $index }})"
                                        class="text-accent hover:underline">Update</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if ($this->isDelete[$index])
                        <form
                            class="grid grid-cols-1 gap-2 rounded-lg bg-primary-light p-2 dark:bg-primary-dark"wire:submit.prevent='delete'
                            wire:key='delete'>
                            <div class="grid gap-2">
                                <div class="grid">
                                    <span class="pb-2">Key</span>
                                    <input type="text"
                                        class="w-full rounded-lg bg-secondary-light p-4 dark:bg-secondary-dark"
                                        placeholder="Key" wire:model.blur='key'>
                                </div>
                            </div>
                            <div class="flex">
                                <button type="submit" class="rounded-lg bg-accent p-4">Delete Now</button>
                                <div class="grow"></div>
                                <button type="submit" class="rounded-lg border border-accent p-4 text-accent"
                                    wire:click='close(1)'>Close</button>
                            </div>
                        </form>
                    @endif
                    @if ($this->isForm[$index])
                        <form
                            class="grid grid-cols-1 gap-2 rounded-lg bg-primary-light p-2 dark:bg-primary-dark"wire:submit.prevent='update({{ $index }})'
                            wire:key='update_{{ $files->id }}'>
                            <div class="grid gap-2">
                                <div class="grid">
                                    <span class="pb-2">{{ $isKey ? 'Key' : 'Value' }} Update</span>
                                    <input type="text"
                                        class="w-full rounded-lg bg-secondary-light p-4 dark:bg-secondary-dark"
                                        placeholder="Data" wire:model.blur='{{ $isKey ? 'key' : 'value' }}'>
                                    @error('key')
                                        <span class="pt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="rounded-lg bg-accent p-4">Create Now</button>
                            </div>
                        </form>
                        <div class="pt-2"></div>
                    @endif
                </div>
                <button class="hover:underline"
                    wire:click='enable({{ $files->id }})'>{{ $files->enabled ? 'Disable' : 'Enable' }}</button>
            </div>
        @empty
        @endforelse
        {{ $dataAll->links('vendor.livewire.simple-tailwind') }}

    </div>
</div>
