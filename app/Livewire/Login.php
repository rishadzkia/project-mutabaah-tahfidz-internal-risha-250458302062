<?php

namespace App\Livewire; 

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component 

{
    #[Title('Login MutabaahQ')]
    public $email, $password;

    public function login()
    {
        $this->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect('/admin');
            
        } elseif ($user->role === 'guru') {
                return redirect()->route('guru.dashboard');
            } elseif ($user->role === 'siswa') {
                return redirect()->route('siswa.dashboard'); 
            }

            // Default redirect jika role tidak dikenali
            return redirect()->route('home');
        }

        $this->addError('email', 'Email atau password salah.');
    }

    public function render()
    {
        return view('livewire.login');
    } 
    public function logout()
    {
        Auth::logout();
        session()->invalidate(); 
        session()->regenerateToken();

        return redirect('/'); // redirect ke landing page
    }
}
