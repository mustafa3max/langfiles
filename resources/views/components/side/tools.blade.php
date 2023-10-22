<div>
    <h3 class="rounded-t-lg bg-secondary-light p-4 text-center text-xl font-bold dark:bg-secondary-dark">
        {{ __('tools.tools') }}
    </h3>
    <ul class="flex flex-wrap gap-2 rounded-b-lg border-8 border-secondary-light p-2 dark:border-secondary-dark"
        x-data="{
            topics: {
                'langtool flutter': '/tools/langtool-flutter',
                'langtool laravel': '/tools/langtool-laravel',
            }
        }">
        <template x-for="[text, url] in Object.entries(topics)">
            <li class="grow">
                <a :href="url" x-text="text" title="{{ __('me_str.open_new_tab') }}"
                    class="block rounded-lg bg-secondary-light p-2 text-center hover:bg-accent hover:text-primary-dark dark:bg-secondary-dark hover:dark:bg-accent">
                </a>
            </li>
        </template>
    </ul>
</div>
