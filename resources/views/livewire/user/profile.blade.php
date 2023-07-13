<div>
    <x-card>
        <img src="{{ $user->avatar }}" alt="{{ $user->name }}"
            class="w-24 h-24 rounded-full border-2 border-primary-light dark:border-primary-dark shadow-sm mx-auto">

        <div class="pt-4 text-center grid gap-2">
            <h1 class="font-semibold uppercase">{{ $user->name }}</h1>
            <p>{{ $user->email }}</p>
            <button wire:click='logout' class="hover:underline">{{ __('me_str.logout') }}</button>
        </div>
    </x-card>
</div>
