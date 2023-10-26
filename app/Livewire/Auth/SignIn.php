<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SignIn extends Component
{
    public $email;
    public $password;
    public $remember;

    public function login()
    {
        $validated = $this->validate([
            'remember' => 'boolean|nullable',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $validated['email'], 'password' => $validated['password']], $validated['remember'])) {
            return $this->redirect(session()->pull('path_previous') ?? url()->to('/types'));
        }

        $this->dispatch('message', __('error.login'));
    }

    public function mount()
    {
        if (Auth::check()) {
            return $this->redirect('/types');
        }
    }

    public function render()
    {
        return view('livewire.auth.sign-in');
    }
}
