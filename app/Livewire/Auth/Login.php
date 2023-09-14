<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{
    #[Rule('required|email')]
    public $email = '';

    #[Rule('required')]
    public $password = '';

    #[Rule('boolean|nullable')]
    public $remember = '';

    public function login()
    {
        $attr = $this->validate();

        if (Auth::attempt(['email' => $attr['email'], 'password' => $attr['password']], $attr['remember'])) {
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
