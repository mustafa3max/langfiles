<a class="bg-secondary-light dark:bg-secondary-dark text-center rounded-lg hover:bg-accent dark:hover:bg-accent shadow-md flex flex-col"
    href="{{ $countItems > 0 ? route($route, $dataRoute) : '#' }}">
    <div class="h-10 p-6 flex-1">
        <i class="fa-solid fa-{{ $icon }} fa-2xl text-secondary-dark dark:text-secondary-light opacity-50"></i>
    </div>
    <p class="break-words text-lg flex items-center justify-center h-full m-4"> {{ $data }}</p>

    <div class="bg-primary-light dark:bg-primary-dark m-1 rounded-lg p-2 flex gap-2 items-center justify-center">
        <span class="">{{ $countItems }}</span>
        <span class="">{{ __('me_str.item') }}</span>
    </div>
</a>
