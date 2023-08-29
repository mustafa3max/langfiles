<div>
    <h3 class="rounded-t-lg bg-secondary-light p-4 text-center text-xl font-bold dark:bg-secondary-dark">
        {{ __('me_str.related_topics') }}
    </h3>
    <ul class="flex flex-wrap gap-2 rounded-b-lg border-8 border-secondary-light p-2 dark:border-secondary-dark"
        x-data="{
            topics: {
                '{{ __('topics.laravel_localization', ['LANG' => 'en']) }}': 'https://laravel.com/docs/10.x/localization',
                '{{ __('topics.dart_localization', ['LANG' => 'en']) }}': 'https://docs.flutter.dev/ui/accessibility-and-localization/internationalization',
                '{{ __('topics.android_localization', ['LANG' => 'en']) }}': 'https://developer.android.com/guide/topics/resources/localization',
            }
        }">
        <template x-for="[text, url] in Object.entries(topics)">
            <li class="grow">
                <a :href="url" x-text="text" target="_blank" rel="nofollow"
                    title="{{ __('me_str.open_new_tab') }}"
                    class="block rounded-lg bg-secondary-light p-2 text-center hover:bg-accent hover:text-primary-dark dark:bg-secondary-dark hover:dark:bg-accent">
                </a>
            </li>
        </template>
    </ul>
</div>
