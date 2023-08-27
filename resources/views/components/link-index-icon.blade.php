<a href="#{{ $id }}" class="px-2 py-4 font-semibold hover:border-accent" title="{{ $title }}"
    id="{{ $id }}-link"
    x-on:click="select[0]=false;select[1]=false;select[2]=false;select[3]=false;select[{{ $index }}]=true;">
    <i class="fa-solid fa-lg" :class="select[{{ $index }}] ? 'fa-circle-dot text-accent' : 'fa-circle'"
        id="{{ $id }}-link-icon"></i>
</a>
