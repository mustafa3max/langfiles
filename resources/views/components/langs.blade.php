 <div>
     <div class="flex gap-4">
         <button x-on:click="isAr=true; isArbic(true)"
             class="block rounded-t-lg bg-primary-light px-8 py-4 dark:bg-primary-dark"
             :class="isAr ? 'font-bold' :
                 'bg-opacity-50 dark:bg-opacity-50 border-b-2 border-secondary-light p-2 dark:border-secondary-dark'">
             {{ __('lang.ar') }}
         </button>
         <button x-on:click="isAr=false; isArbic(false)"
             class="block rounded-t-lg bg-primary-light px-8 py-4 dark:bg-primary-dark"
             :class="!isAr ? 'font-bold' :
                 'bg-opacity-50 dark:bg-opacity-50 border-b-2 border-secondary-light p-2 dark:border-secondary-dark'">
             {{ __('lang.en') }}
         </button>
     </div>
     <div class="rounded-b-lg rounded-e-lg bg-secondary-light dark:bg-secondary-dark">
         {{ $slot }}
     </div>
     <script>
         function isArbic(isAr) {
             sessionStorage.setItem('isAr', isAr);
         }
     </script>
 </div>
