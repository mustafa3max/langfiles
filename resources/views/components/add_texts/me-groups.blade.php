<div x-show="isMeGroups" x-on:click.outside="isMeGroups = false" x-transition.duration.500ms
    class="absolute top-14 z-40 rounded-lg border-4 border-secondary-light bg-primary-light p-4 shadow-lg dark:border-secondary-dark dark:bg-primary-dark">
    <div class="grid gap-4">
        <div class="grid gap-2" x-data="{ groups: $wire.meGroupsQuery }">
            <span class="text-center font-bold">{{ __('me_str.list_me_groups') }}</span>
            <template x-for="group in groups">
                <button x-on:click="$dispatch('changeGroupName', {group: group}); isMeGroups = false"
                    class="h-fit w-full rounded-lg bg-secondary-light p-2 hover:text-accent dark:bg-secondary-dark"
                    x-text="group"></button>
            </template>
        </div>
        {{-- window.changeInputMeGroup(group, true) --}}
        <div class="border-b-2 border-secondary-light dark:border-secondary-dark"></div>
        <button x-on:click="window.changeInputMeGroup('group_'+parseInt(Math.random()*100000)); isMeGroups = false;"
            class="h-fit rounded-lg border border-accent p-2 text-accent hover:bg-secondary-light hover:dark:bg-secondary-dark">{{ __('me_str.new_group') }}</button>
    </div>
</div>
