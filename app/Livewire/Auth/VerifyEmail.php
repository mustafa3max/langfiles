<?php

namespace App\Livewire\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class VerifyEmail extends Component
{

    public function mount()
    {
        // event(new Registered(Auth::user()));
        // Mail::to(Auth::user()->email)->send();

        dd(Auth::user()->email);

        if (Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('types');
        }
    }

    public function render()
    {
        return view('livewire.auth.verify-email');
    }
}
