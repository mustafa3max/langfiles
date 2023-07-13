{{-- php artisan make:model ArTowdDesignProgram -m --}}
{{-- php artisan make:model ArThreedDesignProgram -m --}}
{{-- php artisan make:model ArAnimationProgram -m --}}
{{-- php artisan make:model ArBrowser -m --}}
{{-- php artisan make:model ArIde -m --}}
{{-- php artisan make:model ArLanguage -m --}}
{{-- php artisan make:model ArLogin -m --}}
{{-- php artisan make:model ArPageName -m --}}
{{-- php artisan make:model ArPhotoEditingProgram -m --}}
{{-- php artisan make:model ArProgrammingLanguage -m --}}
{{-- php artisan make:model ArRegister -m --}}
{{-- php artisan make:model ArVideoEditingProgram -m --}}

<div>
    @foreach ($files as $file)
        <pre dir="ltr"><code>{{ $file }}</code></pre>
    @endforeach
</div>
