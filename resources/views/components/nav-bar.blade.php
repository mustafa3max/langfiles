<nav class="bg-secondary-light dark:bg-secondary-dark shadow-md">
    <div class="flex flex-wrap">
        {{-- Right --}}
        <div class="w-full md:w-3/12 lg:w-2/12 xl:w-3/12 bg-accent h-0">
        </div>
        <div class="w-full md:w-full lg:w-8/12 xl:w-6/12 relative z-20 p-2" x-data="{ isMenu: false }">
            <div class="flex flex-wrap items-center justify-between mx-auto">
                <ul class="flex gap-6 items-center">
                    <li>
                        <a href="#" x-on:click="isMenu=!isMenu" class="block hover:text-accent">
                            <i class="fa-solid fa-bars fa-xl"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/types" class="block hover:text-accent">
                            <i class="fa-solid fa-home fa-xl"></i>
                        </a>
                    </li>
                </ul>
                <a href="/" class="flex items-center">
                    <img src="{{ asset('assets/images/logo.svg') }}" class="h-12 w-12" alt="Langfiles Logo" />
                </a>
            </div>
            @component('components.head-links')
            @endcomponent
            <div class="absolute start-0 top-12 ps-2">
                <x-menu-bar />
            </div>
        </div>
        {{-- Left --}}
        <div class="w-full md:w-3/12 lg:w-2/12 xl:w-3/12 bg-accent h-0">
        </div>
    </div>
</nav>
