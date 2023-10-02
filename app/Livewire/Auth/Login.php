<?php

namespace App\Livewire\Auth;

use App\Models\User;
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
            return $this->redirect(session()->pull('path_previous') ?? url()->to('/types'), navigate: true);
        }

        $this->dispatch('message', __('error.login'));
    }

    public function mount()
    {
        if (Auth::check()) {
            return $this->redirect('/types', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
