<div>
    @section('page-title')
        {{ $article->title }}
    @endsection
    @section('page-description')
        {{ $article->desc }}
    @endsection
    @section('page-keywords')
        {{ __('seo.key_words_file') }}
    @endsection

    <x-card>
        <div class="grid items-center justify-center">
            <div dir="rtl">
                <h1 class="text-xl bg-primary-light dark:bg-primary-dark py-4 px-2 rounded-t-lg">{!! $article->title !!}
                </h1>
                <div class="bg-primary-light dark:bg-primary-dark p-2 rounded-b-lg">
                    {!! $article->article !!}
                </div>
            </div>
            <div class="pt-2 flex flex-wrap gap-2 items-center justify-center">
                <div class="flex gap-2 bg-primary-light dark:bg-primary-dark rounded-lg p-2 items-center">
                    <span>{{ __('me_str.author') }}</span>
                    <a href="/mustafamax/profile">
                        @component('components.text-button', ['value' => $article->author])
                        @endcomponent
                    </a>
                </div>
                {{-- <div class="flex gap-2 bg-primary-light dark:bg-primary-dark rounded-lg p-2 items-center">
                <span>{{ __('me_str.comments') }}</span>
                <i class="fa-solid fa-list"></i>
                @component('components.text-button', ['value' => 45])
                @endcomponent
            </div> --}}
            </div>
        </div>
    </x-card>

    <script>
        function selectText(containerid) {
            if (document.selection) {
                var range = document.body.createTextRange();
                range.moveToElementText(document.getElementById(containerid));
                range.select();
            } else if (window.getSelection) {
                var range = document.createRange();
                range.selectNode(document.getElementById(containerid));
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(range);
            }
        }
    </script>
</div>
