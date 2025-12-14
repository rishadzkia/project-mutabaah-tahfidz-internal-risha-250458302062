<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class RegisterKedua extends Component

{
    
    use WithFileUploads;

    public $role;

    // siswa
    public $image;
    public $kelas;
    public $angkatan;
    public $guru_id;

    // guru
    public $foto_url;
    public $mapel_diampu;
    public $mulai_kerja;

    public function mount()
    {
        $this->role = Auth::user()->role;
    }

    public function render()
    {
        return view('livewire.register-kedua');
    }
}
