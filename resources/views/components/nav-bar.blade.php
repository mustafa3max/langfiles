<nav class="bg-secondary-light dark:bg-secondary-dark shadow-md">
    <div class="flex flex-wrap">
        {{-- Right --}}
        <div class="w-full md:w-3/12 lg:w-2/12 xl:w-3/12 bg-accent h-0">
        </div>
        {{-- Body --}}
        <div class="w-full md:w-full lg:w-8/12 xl:w-6/12 relative z-20 p-2" x-data="{ isMenu: false }">
            <div class="flex flex-wrap items-center justify-between mx-auto">
                <ul class="flex gap-6 items-center">
                    <li>
                        <a href="#" x-on:click="isMenu=!isMenu" class="block hover:text-accent"
                            title="{{ __('me_str.drop_list') }}">
                            <i class="fa-solid fa-bars fa-xl"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/types" class="block hover:text-accent" title="{{ __('me_str.home') }}">
                            <i class="fa-solid fa-home fa-xl"></i>
                        </a>
                    </li>

                    <li>
                        <a href="/blog" class="block hover:text-accent">
                            {{ __('me_str.blog') }}
                        </a>
                    </li>
                </ul>
                <a href="/" class="flex items-center" title="{{ config('app.name') }}">
                    <img src="{{ asset('assets/images/logo.svg') }}" class="h-12 w-12" alt="Langfiles Logo" />
                </a>
            </div>

            <div class="absolute start-1 top-12">
                <x-menu-bar />
            </div>
        </div>
        {{-- Left --}}
        <div class="w-full md:w-3/12 lg:w-2/12 xl:w-3/12 bg-accent h-0">
        </div>
    </div>
</nav>
