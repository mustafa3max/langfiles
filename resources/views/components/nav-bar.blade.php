<nav class="bg-secondary-light shadow-md dark:bg-secondary-dark">
    <div class="flex flex-wrap">
        <div class="container relative z-20 mx-auto p-2" x-data="{ isMenu: false }">
            <div class="mx-auto flex flex-wrap items-center justify-between">
                <ul class="flex items-center gap-6">
                    <li>
                        <a x-on:click="isMenu=!isMenu" class="block cursor-pointer hover:text-accent"
                            title="{{ __('me_str.drop_list') }}">
                            <x-svg.list />
                        </a>
                    </li>
                    <li>
                        <a href="/types" class="block hover:text-accent" title="{{ __('me_str.home') }}">
                            <x-svg.home />
                        </a>
                    </li>

                    <li>
                        <a href="/ar/blog" class="block hover:text-accent" target="_blank"
                            title=" {{ __('me_str.blog') }}">
                            <x-svg.blog />
                        </a>
                    </li>

                    <li>
                        <a class="relative block cursor-pointer hover:text-accent"
                            title="{{ __('me_str.me_str_trans') }}" x-on:click="isMeData=!isMeData">
                            <i x-show="isMeData"><x-svg.code_1 /></i>
                            <i x-show="!isMeData"><x-svg.code_2 /></i>
                            <span
                                class="absolute -top-3 start-3 flex h-5 w-5 items-center justify-center rounded-full bg-accent text-xs font-bold text-primary-light"
                                x-text="countMeCode" x-show="countMeCode>0"></span>
                        </a>
                    </li>

                    <li>
                        <a class="flex cursor-pointer items-center gap-4 hover:text-accent" x-cloak
                            x-on:click="darkMode = !darkMode;"
                            :title="darkMode ? '{{ __('me_str.light_appearance') }}' : '{{ __('me_str.dark_appearance') }}'">
                            <i x-show="!darkMode"><x-svg.moon /></i>
                            <i x-show="darkMode"> <x-svg.sun /></i>
                        </a>
                    </li>
                </ul>
                <a href="/" class="flex items-center max-ss:hidden" title="{{ config('app.name') }}">
                    <img src="{{ asset('assets/images/logo.svg') }}" class="h-12 w-12" alt="{{ config('app.name') }}" />
                </a>

            </div>

            <div class="absolute start-1 top-12">
                <x-menu-bar />
            </div>
        </div>
    </div>

</nav>
