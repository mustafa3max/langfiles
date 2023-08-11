<div class="flex grow flex-wrap gap-2" role="group">
    <x-btn-convert index='0'>json</x-btn-convert>
    <x-btn-convert index='1'>php</x-btn-convert>
    <x-btn-convert index='2'>android</x-btn-convert>
    <x-btn-convert index='3'>ios</x-btn-convert>
    <x-btn-convert index='4'>django</x-btn-convert>
    <x-btn-convert index='5'>xlf</x-btn-convert>
    <div x-on:click="isCode=false" x-show="!isGroup">
        @component('components.btn-file', ['icon' => 'pen', 'text' => __('me_str.edit_mode')])
        @endcomponent
    </div>
    <div x-on:click="isGroup=isGroup=!isGroup; isCode=!isCode" x-show="!isGroup">
        @component('components.btn-file-fill', [
            'icon' => ['plus', 'xmark'],
            'text' => [__('me_str.group_mode'), __('me_str.edit_mode')],
        ])
        @endcomponent
    </div>
</div>
