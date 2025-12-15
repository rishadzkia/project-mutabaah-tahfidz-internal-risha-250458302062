<?php

namespace App\Livewire\Guru\Pengumuman;

use App\Models\Pengumuman;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
 
class Create extends Component

{
    #[Layout('components.layouts.base')]
    #[Title('Membuat Pengumuman')]
    public $name;      // Nama guru (user)
    public $guru_id;   // ID dari tabel guru
    public $judul;
    public $isi;

    public function render()
    {
        return view('livewire.guru.pengumuman.create');
    }

    public function mount()
    {
        $user = Auth::user();

        // Nama guru dari tabel users
        $this->name = $user->name;

        // Guru ID dari tabel guru
        $this->guru_id = $user->guru->id ?? null;
    }

    public function create()
    {
        Pengumuman::create([
            'guru_id' => $this->guru_id,
            'judul'   => $this->judul,
            'isi'     => $this->isi,
        ]);

        session()->flash('success', 'Pengumuman berhasil dikirim!');

        // Reset form
        return $this->redirect('pengumuman', navigate:true);
    }
}
