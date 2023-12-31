 <div>
     @php
         $keys = [];
     @endphp
     @foreach (array_values($file) as $f)
         @foreach ($f as $l)
             @php
                 if ($l->key == $data->key) {
                     $keys[] = $l->value;
                 }
             @endphp
         @endforeach
     @endforeach

     <button
         :title="Object.keys(meCode).includes('{{ $data->key }}') ? '{{ __('me_str.selected') }}' :
             '{{ __('me_str.select') }}'"
         x-show="isGroup"
         x-on:click="Object.keys(meCode).includes('{{ $data->key }}')?
         removeCode('{{ $data->key }}',  ['{{ Globals::languages()[0] }}','{{ Globals::languages()[1] }}']):
         addCode('{{ $data->key }}','{{ json_encode($keys) }}', ['{{ Globals::languages()[0] }}','{{ Globals::languages()[1] }}']);
         countMeCode = countCode();meCode=JSON.parse(localStorage.getItem('arCodeAll')) ?? {} ;
         isSelectTab = Object.keys(meCode).length > 0 ? [true, false] : []"
         class="m-1 flex h-12 items-center justify-center gap-1">
         <i class="fa-solid fa-lg"
             :class="Object.keys(meCode).includes('{{ $data->key }}') ? 'fa-square-check text-accent' :
                 'fa-square text-{{ $type ?? 'primary' }}-light dark:text-{{ $type ?? 'primary' }}-dark'"></i>
     </button>
     <input type="checkbox" name="" id="{{ $data->key }}">
 </div>
