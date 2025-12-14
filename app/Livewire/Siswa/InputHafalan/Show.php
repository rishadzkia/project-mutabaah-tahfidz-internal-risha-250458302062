<?php

namespace App\Livewire\Siswa\InputHafalan;

use App\Models\Hafalan;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Livewire\Attributes\Title;

class Show extends Component
{

 
    #[Layout('components.layouts.base')]
    #[Title('Halaman Hafalan')]
    public $hafalan;
    public function render()
    {

        $this->hafalan = Hafalan::with([
            'siswa.user',

        ])->get();
         

        return view('livewire.siswa.input-hafalan.show', []);
    }

    public function mount()
    {
        'siswa_id'; 
    }

    public function destroy($id)
    {
        $hafalan = Hafalan::findOrFail($id);
        $hafalan->delete();

        session()->flash('success', 'Data berhasil dihapus');


        $this->hafalan = Hafalan::with(['siswa.user'])->get();
    }
}
