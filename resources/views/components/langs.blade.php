 <div>
     <div class="flex gap-4">
         @foreach ($data as $lang => $dataLang)
             <button
                 @if ($lang != $langNow) wire:click='selectLang("{{ $lang }}")'
                  class="
                     bg-opacity-50 grow dark:bg-opacity-50 py-4 bg-primary-light dark:bg-primary-dark rounded-t-lg "
             @else
                   class="block grow rounded-t-lg bg-primary-light py-4 dark:bg-primary-dark font-extrabold cursor-not-allowed" @endif>
                 {{ __('lang.' . $lang) }}
             </button>
         @endforeach

     </div>
     <div class="rounded-b-lg bg-primary-light dark:bg-primary-dark">
         {{ $slot }}
     </div>
 </div>
