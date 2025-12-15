<?php

namespace App\Livewire\Guru\SiswaTertanda;

use App\Models\SiswaTertanda; 
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Show extends Component
{
    #[Layout('components.layouts.base')]
    #[Title('Halaman Siswa Tertanda')]
    
    public function render()
    {
        $siswaTertanda = SiswaTertanda::with(['siswa.user', 'hafalan'])
            ->where('guru_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('livewire.guru.siswa-tertanda.show', [
            'siswaTertanda' => $siswaTertanda
        ]);
    }

    public function hapusTanda($id)
    {
        $siswaTertanda = SiswaTertanda::find($id);
        if ($siswaTertanda) {
            $siswaTertanda->delete();
            session()->flash('message', 'Tanda berhasil dihapus!');
        }
    }
}
