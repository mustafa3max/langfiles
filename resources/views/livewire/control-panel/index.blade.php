<div class="min-h-full">
    <div class="grid max-ss:grid-cols-1 max-sm:grid-cols-2 max-md:grid-cols-3 max-lg:grid-cols-4 grid-cols-5 gap-2">
        @forelse ($types as $type)
            @php
                $language = $type[0] . $type[1];
            @endphp
            @if (in_array($language, $languages))
                @php
                    $newType = str_replace('ar', '', $type);
                    $newType = str_replace('_', ' ', $newType);
                @endphp

                <div class="bg-secondary-light dark:bg-secondary-dark rounded-lg p-2 text-center flex flex-col">
                    <p class="grow">{{ $newType }}</p>
                    <div class="flex pt-2 gap-2">
                        <a href="{{ route('create', ['type' => $type]) }}"
                            class="p-2 grow text-accent rounded-lg hover:underline">Create</a>
                        <a href="{{ route('update', ['type' => $type]) }}"
                            class="p-2 grow text-accent rounded-lg hover:underline">Update</a>
                    </div>
                </div>
            @endif
        @empty
        @endforelse
    </div>
</div>
