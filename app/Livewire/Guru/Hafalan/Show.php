<?php

namespace App\Livewire\Guru\Hafalan;

use App\Models\Hafalan;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Livewire\Attributes\Title;

class Show extends Component
{
    public $search = '';
    public $filterMonth = '';
    public $filterDate = '';

    #[Layout('components.layouts.base')] 
    #[Title('Halaman Hafalan')]
    public function render()
    {
        $query = Hafalan::with(['siswa.user']) 
            ->whereHas('siswa.user', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });

        // Filter bulan 
        if ($this->filterMonth) {
            $query->whereMonth('created_at', $this->filterMonth);
        }

        // Filter tanggal spesifik
        if ($this->filterDate) {
            $query->whereDate('created_at', $this->filterDate);
        }

        $hafalan = $query->get();

        return view('livewire.guru.hafalan.show', [
            'hafalan' => $hafalan
        ]);
    }

    public function exportPDF()
    {
        $query = Hafalan::with(['siswa.user'])
            ->whereHas('siswa.user', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%');
            });

        if ($this->filterMonth) {
            $query->whereMonth('created_at', $this->filterMonth);
        }

        if ($this->filterDate) {
            $query->whereDate('created_at', $this->filterDate);
        }

        $data = $query->get();

        $pdf = Pdf::loadView('livewire.guru.hafalan.pdf', [
            'hafalan' => $data
        ]);

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'laporan-hafalan.pdf');
    }
}
