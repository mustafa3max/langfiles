{{-- <div class="max-md:hidden pb-2"> --}}
<div class="pb-2" id="ad-box">
    <script>
        window.googletag.cmd.push(function() {
            var w = document.getElementById('ad-box').offsetWidth;
            var sizes = [320, 50];

            if (w >= 970) {
                sizes = [
                    [728, 90],
                    [750, 200],
                    [970, 250],
                    [970, 90],
                    [970, 66],
                ];
            } else if (w >= 750 && w < 970) {
                sizes = [
                    [728, 90],
                    [750, 200]
                ];

            } else if (w < 728 && w >= 640) {
                sizes = [
                    [640, 640]
                ];

            } else if (w >= 728 && w < 750) {
                sizes = [
                    [728, 90],
                ];
            }
            var responsiveAdSlot = googletag.defineSlot('/6355419/Travel/Europe/France/Paris',
                sizes, 'banner-ad').addService(googletag.pubads());

            // googletag.pubads().enableSingleRequest();
            // googletag.pubads().collapseEmptyDivs();

            googletag.enableServices();
        });
    </script>

    <div class=" flex items-center justify-center">
        <div id="banner-ad">
            <script>
                googletag.cmd.push(function() {
                    googletag.display('banner-ad');
                });
            </script>
        </div>
    </div>
</div>
