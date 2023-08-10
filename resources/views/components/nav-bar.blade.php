<nav class="bg-secondary-light shadow-md dark:bg-secondary-dark">
    <div class="flex flex-wrap">
        {{-- Right --}}
        <div class="h-0 w-full bg-accent md:w-3/12 lg:w-2/12 xl:w-3/12">
        </div>
        {{-- Body --}}
        <div class="relative z-20 w-full p-2 md:w-full lg:w-8/12 xl:w-6/12" x-data="{ isMenu: false }">
            <div class="mx-auto flex flex-wrap items-center justify-between">
                <ul class="flex items-center gap-6">
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
                        <a href="#" class="relative block hover:text-accent"
                            title="{{ __('me_str.me_str_trans') }}" x-on:click="isMeData=!isMeData">
                            <i class="fa-solid fa-xl" :class="isMeData ? 'fa-clipboard-check' : 'fa-file-code'"></i>
                            <span
                                class="absolute -top-3 start-3 flex h-5 w-5 items-center justify-center rounded-full bg-accent text-xs font-bold text-primary-dark"
                                x-text="countMeCode" x-show="countMeCode>0"></span>
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
        <div class="h-0 w-full bg-accent md:w-3/12 lg:w-2/12 xl:w-3/12">
        </div>
    </div>

</nav>
