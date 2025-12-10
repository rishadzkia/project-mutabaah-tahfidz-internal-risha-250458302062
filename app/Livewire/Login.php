<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component; 
class Login extends Component 
{
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
                return redirect()->route('filament.admin.pages.dashboard');
            
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
}
