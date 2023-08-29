<div>
    <h3 class="rounded-t-lg bg-secondary-light p-4 text-center text-xl font-bold dark:bg-secondary-dark">
        {{ __('me_str.supported_extensions') }}
    </h3>
    <ul class="flex flex-wrap gap-2 rounded-b-lg border-8 border-secondary-light p-2 dark:border-secondary-dark">
        @foreach (Globals::supportedExtensions() as $extensions)
            <li class="grow rounded-lg bg-secondary-light p-2 text-center dark:bg-secondary-dark">
                {{ $extensions }}
            </li>
        @endforeach
    </ul>
</div>
