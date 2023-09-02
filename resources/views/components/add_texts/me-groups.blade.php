<div x-show="isMeGroups" x-on:click.outside="isMeGroups = false" x-transition.duration.500ms
    class="absolute top-14 grid gap-4 rounded-lg border-4 border-secondary-light bg-primary-light p-4 shadow-lg dark:border-secondary-dark dark:bg-primary-dark">
    <span class="text-center font-bold">{{ __('me_str.list_me_groups') }}</span>

    <div class="grid gap-2">
        @foreach ($meGroups as $group)
            <button x-on:click="window.changeInputMeGroup('{{ $group }}'); isMeGroups = false"
                class="h-fit rounded-lg bg-secondary-light p-2 hover:text-accent dark:bg-secondary-dark">{{ $group }}</button>
        @endforeach
        <button x-on:click="window.changeInputMeGroup('{{ __('me_str.new_group') }}'); isMeGroups = false"
            class="h-fit rounded-lg border border-accent p-2 text-accent hover:bg-secondary-light hover:dark:bg-secondary-dark">{{ __('me_str.new_group') }}</button>
    </div>
</div>
