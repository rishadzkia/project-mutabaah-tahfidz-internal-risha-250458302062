<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;

class Register extends Component
{
    #[Title('Registrasi')]
    public $name;
    public $email;
    public $password;
    public $role;

    public function register()
    {
        $this->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required|in:guru,siswa',
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => $this->role,
        ]);



        session()->flash('success', 'Akun berhasil dibuat! Silakan login.');

        Auth::login($user);

        // Redirect sesuai role
        if ($user->role === 'guru') {
            return redirect('/register-kedua');
        }

        if ($user->role === 'siswa') {
            return redirect('/register-kedua');
        }
    }


    public function render()
    {
        return view('livewire.auth.register');
    }
}
