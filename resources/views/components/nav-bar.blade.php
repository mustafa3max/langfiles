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
                        <a x-on:click="isMenu=!isMenu" class="block cursor-pointer hover:text-accent"
                            title="{{ __('me_str.drop_list') }}">
                            <i class="fa-solid fa-bars fa-xl"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/types" class="block hover:text-accent" title="{{ __('me_str.home') }}">
                            <i class="fa-solid fa-home fa-xl"></i>
                        </a>
                    </li>

                    {{-- <li>
                        <a href="/blog" class="block hover:text-accent" title=" {{ __('me_str.blog') }}">
                            <i class="fa-solid fa-file-signature fa-xl"></i>
                        </a>
                    </li> --}}

                    <li>
                        <a class="relative block cursor-pointer hover:text-accent"
                            title="{{ __('me_str.me_str_trans') }}" x-on:click="isMeData=!isMeData">
                            <i class="fa-solid fa-xl" :class="isMeData ? 'fa-clipboard-check' : 'fa-file-code'"></i>
                            <span
                                class="absolute -top-3 start-3 flex h-5 w-5 items-center justify-center rounded-full bg-accent text-xs font-bold text-primary-dark"
                                x-text="countMeCode" x-show="countMeCode>0"></span>
                        </a>
                    </li>

                    <li>
                        <a class="flex cursor-pointer items-center gap-4 hover:text-accent" x-cloak
                            x-on:click="darkMode = !darkMode;"
                            :title="darkMode ? '{{ __('me_str.light_appearance') }}' : '{{ __('me_str.dark_appearance') }}'">
                            <i x-show="!darkMode" class="fa-solid fa-moon fa-xl"></i>
                            <i x-show="darkMode" class="fa-solid fa-sun fa-xl"></i>
                            <span x-show="!darkMode">

                            </span>
                            <span x-show="darkMode">

                            </span>
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
