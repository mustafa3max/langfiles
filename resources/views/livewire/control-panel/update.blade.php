<div dir="ltr">
    <div class="bg-secondary-light dark:bg-secondary-dark p-2 rounded-lg grid grid-cols-1 gap-2">
        @php
            $index = -1;
        @endphp
        @forelse ($dataAll as $files)
            @php
                $index++;
                $this->isForm[] = false;
                $this->isDelete[] = false;
            @endphp
            <div class="flex gap-2 items-center">
                <button class="hover:underline"
                    wire:click='isDelete({{ $files->id }}, {{ $index }})'>Delete</button>
                <div class="grid gap-2 grow">
                    <div class="p-2 bg-primary-light dark:bg-primary-dark rounded-lg grow">
                        <div class="grid">
                            <div
                                class="text-accent border-b border-secondary-light dark:border-secondary-dark text-center p-2">
                                Key</div>
                            <div class="p-6 ps-2 flex" wire:key='key_{{ $files->id }}'>
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
                                class="text-accent border-b border-t border-secondary-light dark:border-secondary-dark text-center p-2">
                                Value</div>
                            <div class="p-6 ps-2 flex" wire:key='close_value_{{ $files->id }}'>
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
                            class="bg-primary-light dark:bg-primary-dark p-2 rounded-lg grid grid-cols-1 gap-2"wire:submit.prevent='delete'
                            wire:key='delete'>
                            <div class="grid gap-2">
                                <div class="grid">
                                    <span class="pb-2">Key</span>
                                    <input type="text"
                                        class="p-4 bg-secondary-light dark:bg-secondary-dark rounded-lg w-full"
                                        placeholder="Key" wire:model.lzy='key'>
                                </div>
                            </div>
                            <div class="flex">
                                <button type="submit" class="bg-accent p-4 rounded-lg">Delete Now</button>
                                <div class="grow"></div>
                                <button type="submit" class="border border-accent p-4 rounded-lg text-accent"
                                    wire:click='close(1)'>Close</button>
                            </div>
                        </form>
                    @endif
                    @if ($this->isForm[$index])
                        <form
                            class="bg-primary-light dark:bg-primary-dark p-2 rounded-lg grid grid-cols-1 gap-2"wire:submit.prevent='update({{ $index }})'
                            wire:key='update_{{ $files->id }}'>
                            <div class="grid gap-2">
                                <div class="grid">
                                    <span class="pb-2">{{ $isKey ? 'Key' : 'Value' }} Update</span>
                                    <input type="text"
                                        class="p-4 bg-secondary-light dark:bg-secondary-dark rounded-lg w-full"
                                        placeholder="Data" wire:model.lzy='{{ $isKey ? 'key' : 'value' }}'>
                                    @error('key')
                                        <span class="pt-2">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="">
                                <button type="submit" class="bg-accent p-4 rounded-lg">Create Now</button>
                            </div>
                        </form>
                        <div class="pt-2"></div>
                    @endif
                </div>
            </div>
        @empty
        @endforelse
        {{ $dataAll->links('vendor.livewire.simple-tailwind') }}

    </div>
</div>
