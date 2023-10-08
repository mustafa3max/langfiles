<div x-data="{ file: null, path: sessionStorage.getItem('file_user') }">
    <x-card>
        <input type="file" name="" id=""
            x-on:change="file = $event.target.files[0]; sessionStorage.setItem('file_user', URL.createObjectURL($event.target.files[0])); path = sessionStorage.getItem('file_user')"
            value="">
        <div x-text="file"></div>
    </x-card>
</div>
