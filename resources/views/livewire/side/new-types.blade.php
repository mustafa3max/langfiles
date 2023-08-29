<div class="">
    <h3 class="rounded-t-lg bg-secondary-light p-4 text-center text-xl font-bold dark:bg-secondary-dark">
        {{ __('me_str.latest_types') }}
    </h3>
    <ul class="rounded-b-lg border-8 border-secondary-light px-3 dark:border-secondary-dark">
        @foreach ($newTypes as $type)
            @php
                $countItems = $this->countItems($type->table);
            @endphp
            <li
                class="{{ $loop->last ? '' : 'border-b-2' }} flex border-secondary-light py-3 hover:rounded-lg hover:text-accent dark:border-secondary-dark">
                <a @if ($countItems > 0) href="{{ '/file/' . str_replace(LaravelLocalization::getCurrentLocale() . '_', 'type_', $type->table) }}" @endif
                    class="grow">{{ $type['name_' . $currentLng] }}</a>
                <span class="">{{ $countItems }}</span>
            </li>
        @endforeach
    </ul>
</div>
