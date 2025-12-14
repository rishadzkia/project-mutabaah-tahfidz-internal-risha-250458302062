<?php

namespace App\Livewire\Siswa\InputHafalan;

use App\Models\Hafalan;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Create extends Component
{
    #[Layout('components.layouts.base')]
    #[Title('Input Hafalan')]
    public $name;
    public $siswa_id;
    public $surah;
    public $juz;
    public $ayat;

    public function mount()
    {
        $user = Auth::user();

        if (! $user->siswa) {
            $siswa = \App\Models\Siswa::create([
                'user_id'  => $user->id,
                'kelas'    => null,
                'angkatan' => null,
                'guru_id'  => null,
            ]);
        } else {
            $siswa = $user->siswa;
        }

        $this->siswa_id = $siswa->id;
        $this->name = $user->name;
    }


    public function create()
    {
        $this->validate([
            'surah' => 'required',
            'ayat'  => 'required',
            'juz'   => 'required|numeric',
        ]);

        Hafalan::create([
            'siswa_id' => $this->siswa_id,
            'surah'    => $this->surah,
            'ayat'     => $this->ayat,
            'juz'      => $this->juz,
        ]);

        session()->flash('success', 'Data berhasil dikirim!');

        return $this->redirect(route('siswa.show-hafalan'), navigate: true);
    }

    public function render()
    {
        return view('livewire.siswa.input-hafalan.create');
    }
}
