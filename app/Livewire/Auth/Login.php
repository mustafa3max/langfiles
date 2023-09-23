<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
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
            $this->reset(['email']);
            $this->reset(['password']);
            $this->reset(['remember']);
            return redirect(session()->pull('path_previous') ?? url()->to('/'));
        }

        $this->dispatch('message', __('error.login'));
    }

    public function mount()
    {
        if (Auth::check()) {
            return redirect()->route('index');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
