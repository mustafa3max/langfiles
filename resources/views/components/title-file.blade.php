<div class="p-2 text-center bg-secondary-light dark:bg-secondary-dark mb-2 rounded-lg">
    @php
        $t = explode('_', $table);
        $lang = $t[0];
        $t = array_slice($t, 1, count($t));
        $t = implode(' ', $t);
    @endphp
    <span>{{ __('lang.' . $lang) }}</span>
    <span class="">{{ $t }}</span>
</div>
