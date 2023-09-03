<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
        'remember' => 'boolean|nullable',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function login()
    {
        $attr = $this->validate();

        if (Auth::attempt(['email' => $attr['email'], 'password' => $attr['password']], $this->remember)) {
            $this->reset(['email']);
            $this->reset(['password']);
            $this->reset(['remember']);
            return redirect(session()->pull('path_previous') ?? url()->to('/'));
        }

        $this->emit('message', __('error.login'));
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
