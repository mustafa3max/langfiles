<div x-data="{ isCode: false }">
    @section('page-title')
        {{ __('seo.title_file') }}
    @endsection
    @section('page-description')
        {{ __('seo.description_file') }}
    @endsection
    @section('page-keywords')
        {{ __('seo.key_words_file') }}
    @endsection

    <div class="p-2 text-center bg-secondary-light dark:bg-secondary-dark mb-2 rounded-lg">
        {{ str_replace('_', ' ', $this->table) }}</div>

    <div class="bg-secondary-light dark:bg-secondary-dark p-2 rounded-lg">
        {{-- Data Show --}}
        <div class="grid gap-2" x-show="!isCode">
            @forelse ($dataAll as $data)
                <div class="flex gap-2" dir="ltr">
                    <div class="grid gap-2 bg-primary-light dark:bg-primary-dark rounded-lg p-2 grow">
                        <div class="flex items-center justify-center gap-2">
                            <span class="w-10 text-accent">{{ __('me_str.key') }}</span>
                            <span class="border-s border-secondary-light dark:border-secondary-dark h-full"></span>
                            <p class="p-2 grow">{{ $data->key }}</p>
                        </div>
                        <span class="border-t border-secondary-light dark:border-secondary-dark h-full"></span>
                        <div class="flex items-center gap-2">
                            <span class="w-10 text-accent">{{ __('me_str.value') }}</span>
                            <span class="border-s border-secondary-light dark:border-secondary-dark h-full"></span>
                            <p class="p-2 grow">{{ $data->value }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-center">
                        <button class="hover:bg-accent rounded-lg w-12 h-12"
                            wire:click='delete("{{ $data->key }}")'><i class="fa-solid fa-xmark"></i></button>
                    </div>
                </div>
            @empty
            @endforelse
        </div>

        {{-- Data Copy --}}
        <div class="bg-secondary-light dark:bg-secondary-dark rounded-lg w-full h-full grid gap-2" x-show="isCode">
            <button class="p-2 hover:bg-accent w-12 h-12 rounded-lg" x-on:click="isCode=false"><i
                    class="fa-solid fa-xmark"></i></button>
            <div class="flex items-center justify-center">
                <div class="bg-primary-light dark:bg-primary-dark p-4 rounded-lg  overflow-hidden w-full"
                    dir="ltr">
                    <code id="code" class="whitespace-pre-wrap" xt="dataset.bibText">{{ $dataCopy }}</code>
                </div>
            </div>
        </div>
    </div>
    <div class="p-1"></div>
    <div class="flex justify-center gap-1">
        <div wire:click='copy' x-on:click="isCode=true" x-show="!isCode">
            @component('components.btn-file', ['icon' => 'code', 'text' => __('me_str.code_mode')])
            @endcomponent
        </div>
        <div onclick="copyContent()" x-show="isCode">
            @component('components.btn-file', ['icon' => 'copy', 'text' => __('me_str.copy_code')])
            @endcomponent
        </div>
    </div>

    <script>
        const copyContent = async () => {
            alert()

            const code = document.getElementById('code')

            console.log(code.innerText)

            const arr = @js($dataCopy)

            const json = JSON.stringify(arr);
            // coe.innerHTML = json
            try {
                if (navigator.clipboard) {
                    await navigator.clipboard.writeText(json);
                } else {}
            } catch (err) {
                console.log('Failed to copy: ' + err);
            }
        }
    </script>

</div>
