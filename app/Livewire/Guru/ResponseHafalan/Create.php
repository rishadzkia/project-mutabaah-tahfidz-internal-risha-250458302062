<?php

namespace App\Livewire\Guru\ResponseHafalan;

use Livewire\Attributes\Title;
use Livewire\Component;

class Create extends Component
{
    #[Title('Response Hafalan')]
    public function render()
    {
        return view('livewire.guru.response-hafalan.create');
    }
}
