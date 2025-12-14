<?php

namespace App\Livewire\Siswa\Murottal;

use App\Models\Murottal;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Show extends Component
{
    #[Layout('components.layouts.base')]
    #[Title('Halaman Murottal')]
    public $murottal;
    public function render()
    {
        return view('livewire.siswa.murottal.show');
    }

    public function mount() 
    {
        $this->murottal = Murottal::all();
    }
}
