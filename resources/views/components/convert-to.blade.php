<div class="flex grow flex-wrap gap-1" role="group">
    <x-btn-convert index='0'>json</x-btn-convert>
    <x-btn-convert index='1'>php</x-btn-convert>
    <x-btn-convert index='2'>android</x-btn-convert>
    <x-btn-convert index='3'>ios</x-btn-convert>
    <x-btn-convert index='4'>django</x-btn-convert>
    <x-btn-convert index='5'>xlf</x-btn-convert>
    <x-btn-convert index='6' title="godot, unity, unreal engine">csv</x-btn-convert>
    <div x-on:click="isCode=false" x-show="isCode && !isMeData">
        <x-btn-file text="__('me_str.edit_mode')">
            <x-svg.edit />
        </x-btn-file>
    </div>
</div>
