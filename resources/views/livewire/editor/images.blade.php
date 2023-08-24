<div class="flex flex-wrap gap-4">
    @foreach ($images as $iamge)
        <img src="{{ $iamge }}" alt="" class="h-80 cursor-pointer rounded-lg border border-accent"
            onload="this.addEventListener('click', function(e) {
                infoImage(e.target.src, '');
            })">
    @endforeach
</div>
