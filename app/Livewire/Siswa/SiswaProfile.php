<?php

namespace App\Livewire\Siswa;

use Livewire\Component;
use App\Models\User;
use Livewire\WithFileUploads;

class SiswaProfile extends Component
{
    public $guru_id;
    public $guruList = [];
    public $user_id;
    public $userList = [];

    use WithFileUploads;

    
    public $kelas;
    public $angkatan;
    public $image;

    public function mount()
    {
        // Ambil user yang role-nya guru
        $this->guruList = User::where('role', 'guru')->get();
        $this->userList = User::where('role', 'siswa')->get();
    }

   

    public function simpan(){
        dd('LIVEWIRE JALAN');
    }

    public function render()
    {
        return view('livewire.siswa.siswa-profile');
        
    }
}

