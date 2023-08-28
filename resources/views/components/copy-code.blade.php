 <div class="flex gap-2" x-data="{ isCopy: false }">
     <div x-show="isCopy" x-transition.duration
         class="relative flex h-12 items-center rounded-lg bg-secondary-light px-2 dark:bg-secondary-dark">
         <div class="absolute -end-1.5 h-3 w-3 rotate-45 rounded-sm bg-secondary-light dark:bg-secondary-dark">
         </div>
         {{ __('me_str.copied') }}
     </div>
     <button title="{{ __('me_str.copy_to_clipboard') }}" x-on:click="isCopy=true" x-timeout:3000="isCopy=false"
         onclick="copyContent('{{ $i }}')"
         class="flex h-12 w-12 items-center justify-center rounded-lg bg-secondary-light bg-opacity-50 hover:text-accent dark:bg-secondary-dark dark:bg-opacity-50">
         <i class="fa-solid" x-show="!isCopy"><x-svg.copy /></i>
         <i class="fa-solid" x-show="isCopy"><x-svg.check /></i>
     </button>

 </div>
