<div class="fixed left-0 right-0 top-0 z-50 border-b-4 border-accent bg-secondary-light text-center font-extrabold dark:bg-secondary-dark"
    x-data="{ show: false, timeout: null, data: '' }" x-show="show" x-show="show" x-init="@this.on('{{ $message ?? 'message' }}', (d) => {
        clearTimeout(timeout);
        show = true;
        data = d;
        timeout = setTimeout(() => show = false, 5000);
    })">
    <div class="container mx-auto px-2">
        <div class="flex items-center py-6">
            <div class="grow text-start" x-text="data"></div>
            <button x-on:click="show=false;{!! session()->forget('message') !!}" class="rounded-full bg-accent p-3 text-primary-dark"
                title="{{ __('me_str.close') }}"><x-svg.x /></button>
        </div>
    </div>
</div>
