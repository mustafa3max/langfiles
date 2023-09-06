<div x-show="isMeGroups" x-on:click.outside="isMeGroups = false" x-transition.duration.500ms
    class="absolute top-14 rounded-lg border-4 border-secondary-light bg-primary-light p-4 shadow-lg dark:border-secondary-dark dark:bg-primary-dark">
    <div class="grid gap-4">
        <div class="grid gap-2">
            <span class="text-center font-bold">{{ __('me_str.list_me_groups') }}</span>

            @foreach ($meGroups as $group)
                <button x-on:click="window.changeInputMeGroup('{{ $group }}', true); isMeGroups = false"
                    wire:key='{{ $group }}'
                    class="h-fit rounded-lg bg-secondary-light p-2 hover:text-accent dark:bg-secondary-dark">{{ $group }}</button>
            @endforeach
        </div>

        <div class="border-b-2 border-secondary-light dark:border-secondary-dark"></div>

        <button x-on:click="window.changeInputMeGroup('group_{{ random_int(1, 10000) }}', false); isMeGroups = false"
            class="h-fit rounded-lg border border-accent p-2 text-accent hover:bg-secondary-light hover:dark:bg-secondary-dark">{{ __('me_str.new_group') }}</button>

    </div>
</div>