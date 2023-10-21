<div>
    @section('page-index')
        noindex
    @endsection

    @section('page-title')
        {{ __('seo.title_email_verify') }}
    @endsection

    @section('page-description')
        {{ __('seo.description_email_verify') }}
    @endsection

    <x-card>
        <div class="grid grid-cols-1 items-center justify-center gap-10 p-8 text-center">
            <x-title>{{ __('seo.title_email_verify') }}</x-title>
            <div class="mb-6 border-b-2"></div>
            <div class="flex justify-center text-center text-accent">
                <img src="{{ asset('assets/images/email_verify.svg') }}" alt="">
            </div>
            <p class="text-xl">
                {{ __('email.send_code_email') }}
                {{ __('seo.description_email_verify') }}
            </p>

            <span class="font-extrabold">{{ __('email.not_verification_code') }} <button
                    class="text-accent hover:underline" wire:click='resendCode'>{{ __('email.resend') }}</button></span>
        </div>
    </x-card>

    <div wire:loading.delay>
        <x-wite />
    </div>
</div>
