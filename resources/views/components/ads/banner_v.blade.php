<div class="h-full w-full pt-2 md:ps-2 md:pt-0" id="ad-box-right">
    <script>
        window.googletag.cmd.push(function() {
            var w = document.getElementById('ad-box-right').offsetWidth;
            var sizes = [
                [300, 600],
                [300, 1050],
                [300, 300],
            ];

            var responsiveAdSlot = googletag.defineSlot('/6355419/Travel/Europe/France/Paris',
                sizes, 'banner-right').addService(googletag.pubads());
            // googletag.pubads().enableSingleRequest();
            // googletag.pubads().collapseEmptyDivs();
            googletag.enableServices();
        });
    </script>
    <div class="grid gap-2">
        <div class="hidden">
            <x-card>
                <div id="banner-right" class="rounded-lg bg-secondary-light p-4 dark:bg-secondary-dark">
                    <script>
                        googletag.cmd.push(function() {
                            googletag.display('banner-right');
                        });
                    </script>
                </div>
            </x-card>
        </div>

        @livewire('side.new-types')
        <x-side.supported-extensions />
        <x-side.related-topics />
    </div>
</div>
