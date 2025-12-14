<?php

namespace App\Livewire\Siswa;

use App\Models\KutipanMotivasi;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('components.layouts.base')]
    #[Title('Dashboard Siswa')]
    public $motivasi;

    public function mount()
    {
        $this->motivasi = KutipanMotivasi::all();
    }
    public function render()
    { 
        
        return view('livewire.siswa.dashboard'); 
    }
    
}
