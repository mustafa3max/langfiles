<?php

namespace App\Http\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;
    public $attr;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
        'remember' => 'boolean',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function login()
    {

        $attr = $this->validate();

        if (Auth::attempt(['email' => $attr['email'], 'password' => $attr['password']], $this->remember)) {
            return redirect()->route('index');
        }

        $this->dispatchBrowserEvent('notify', 'Login Failed');
        $this->reset(['password']);
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
