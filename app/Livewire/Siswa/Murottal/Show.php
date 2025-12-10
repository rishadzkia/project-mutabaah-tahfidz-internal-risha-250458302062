<?php

namespace App\Livewire\Siswa\Murottal;

use App\Models\Murottal;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    #[Layout('components.layouts.base')]
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
