<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Mail;

class VerifyEmail extends Component
{

    function send()
    {
        $data = array('name' => "Virat Gandhi");
        Mail::send('livewire.auth.verify-email', $data, function ($message) {
            $message->to('admin@langfiles.com', 'Tutorials Point')->subject('Laravel HTML Testing Mail');
            $message->from('abofatmaalslman@gmail.com', 'Virat Gandhi');
        });
    }

    function resendCode()
    {
        $user = Auth::user();
        $user->sendEmailVerificationNotification();
    }

    public function mount()
    {
        if (Auth::user()->hasVerifiedEmail()) {
            return $this->redirect('/types', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.auth.verify-email');
    }
}
