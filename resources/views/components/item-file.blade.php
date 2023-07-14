 <div class="flex gap-2" dir="ltr">
     <div class="grid md:flex gap-2 bg-primary-light dark:bg-primary-dark rounded-lg p-2 grow">
         <div class="flex items-center justify-center gap-2">
             <span class="w-10 text-accent md:hidden">{{ __('me_str.key') }}</span>
             <span class="border-s border-secondary-light dark:border-secondary-dark h-full md:hidden"></span>
             <p class="p-2 grow md:text-accent">{{ $data->key }}</p>
         </div>

         <span class="border-t border-secondary-light dark:border-secondary-dark h-full md:hidden"></span>

         <div class="flex items-center gap-2">
             <span class="w-10 text-accent md:hidden">{{ __('me_str.value') }}</span>
             <span class="border-s border-secondary-light dark:border-secondary-dark h-full"></span>
             <p class="p-2 grow">{{ $data->value }}</p>
         </div>
     </div>
     <div class="flex items-center justify-center">
         <button class="hover:bg-accent rounded-lg w-12 h-12" wire:click='delete("{{ $data->key }}")'><i
                 class="fa-solid fa-xmark"></i></button>
     </div>
 </div>
