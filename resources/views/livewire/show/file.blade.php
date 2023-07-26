<div x-data="{ isCode: false }">
    @section('page-title')
        {{ __('seo.title_file', ['TYPE' => __('tables.' . $title)]) }}
    @endsection
    @section('page-description')
        {{ __('seo.description_file', ['TYPE' => __('tables.' . $title)]) }}
    @endsection
    @section('page-keywords')
        {{ __('seo.key_words_file', ['TYPE' => __('tables.' . $title)]) }}
    @endsection

    @component('components.title-file', ['title' => $this->title, 'lang' => $this->lang])
    @endcomponent

    <x-card>
        {{-- Data Show --}}
        <div x-show="!isCode" class="grid gap-2">
            {{-- Undo Delete Item --}}
            @if (count($data) > 0)
                <button
                    class="p-4 bg-accent hover:text-primary-light h-12 flex items-center justify-center gap-4 rounded-lg mx-auto"
                    wire:click='undo()'>{{ __('me_str.undo') }}<i class="fa-solid fa-undo"></i></button>
            @endif
            <div wire:loading>
                <x-load.load-file />
            </div>
            <div class="flex flex-wrap gap-2" wire:loading.remove>
                @forelse ($dataAll as $data)
                    @component('components.item-file', ['data' => $data])
                    @endcomponent
                @empty
                    @component('components.empty', ['route' => 'file', 'dataRoute' => ['type' => $table]])
                    @endcomponent
                @endforelse
            </div>
        </div>
        {{-- Data Copy --}}
        <div class="bg-secondary-light dark:bg-secondary-dark rounded-lg w-full h-full grid gap-2" x-show="isCode">
            <button class="p-2 hover:bg-accent w-12 h-12 rounded-lg" x-on:click="isCode=false"><i
                    class="fa-solid fa-xmark"></i></button>
            <div class="flex items-center justify-center">
                <div class="bg-primary-light dark:bg-primary-dark p-4 rounded-lg  overflow-hidden w-full"
                    dir="ltr">
                    <div class="w-full" wire:loading>
                        <x-load-code />
                    </div>
                    <code id="code" class="whitespace-pre-wrap" xt="dataset.bibText"
                        wire:loading.remove>{{ $dataCopy }}</code>
                </div>
            </div>
        </div>
    </x-card>
    <div class="p-1"></div>
    <div class="flex justify-center items-center gap-4">
        <div wire:click='copy' x-on:click="isCode=true" x-show="!isCode">
            @component('components.btn-file', ['icon' => 'code', 'text' => __('me_str.code_mode')])
            @endcomponent
        </div>
        <div wire:loading.remove onclick="copyContent()" x-show="isCode">
            @component('components.btn-file', ['icon' => 'copy', 'text' => __('me_str.copy_code')])
            @endcomponent
        </div>
    </div>

    <script>
        const copyContent = async () => {
            const code = document.getElementById('code').innerText;
            try {
                if (navigator.clipboard) {
                    await navigator.clipboard.writeText(code);
                    alert('تم نسخ الشفرة');
                } else {
                    alert(code);
                }
            } catch (err) {
                alert(code);

            }
        }
    </script>

</div>
