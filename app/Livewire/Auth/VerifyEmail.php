<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class VerifyEmail extends Component
{

    function resendCode()
    {
        $user = Auth::user();
        $user->sendEmailVerificationNotification();
    }

    public function mount()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('types');
        }
    }

    public function render()
    {
        return view('livewire.auth.verify-email');
    }
}
