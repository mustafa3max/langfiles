<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => [
            'required',
            'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{4,}$/'
        ],
    ];

    protected $messages = [
        'name.required' => 'The Name cannot be empty.',
        'email.required' => 'The Email Address cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
        'password.required' => 'The Password cannot be empty.',
        'password' => 'The password format is not valid.',
    ];

    public function updated($fields)
    {
        $this->validateOnly($fields);
    }

    public function register()
    {
        $attr = $this->validate();

        $user = User::create([
            'email' => $attr['email'],
            'password' => Hash::make($attr['password']),
            'name' => $attr['name'],
        ]);

        if (Auth::attempt(['email' => $attr['email'], 'password' => $attr['password']], true)) {
            $this->reset(['name']);
            $this->reset(['email']);
            $this->reset(['password']);
            return redirect(session()->pull('path_previous') ?? url()->to('/'));
        }
    }

    public function mount()
    {
        if (Auth::check()) {
            return redirect()->route('index');
        }
    }

    public function render()
    {
        return view('livewire..auth.register');
    }
}
