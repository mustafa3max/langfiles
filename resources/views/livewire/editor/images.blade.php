<div class="p-4 bg-primary-light dark:bg-primary-dark h-screen sticky top-0">
    <div class="flex flex-wrap gap-4">
        @foreach ($images as $iamge)
            <img src="{{ $iamge }}" alt="" class="h-80 rounded-lg border border-accent cursor-pointer"
                onclick="addSrc('{{ $iamge }}')">
        @endforeach
    </div>
</div>
