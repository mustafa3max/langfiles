<a href="#{{ $id }}" class="px-2 py-4 font-semibold hover:border-accent"
    :class="select[{{ $index }}] ? 'border-b-4 border-accent text-accent' : ''"
    x-on:click="select[0]=false;select[1]=false;select[2]=false;select[3]=false;select[{{ $index }}]=true;">{{ $slot }}</a>
