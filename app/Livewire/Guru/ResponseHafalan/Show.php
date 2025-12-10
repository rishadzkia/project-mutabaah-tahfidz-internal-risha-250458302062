<?php

namespace App\Livewire\Guru\ResponseHafalan;

use App\Models\Hafalan;
use App\Models\SiswaTertanda;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Show extends Component
{
    #[Layout('components.layouts.base')]
    public $responseHafalan;
    public $selectedStatus = [];
    public $search = '';
    public $filterMonth = '';
    public $filterDate = '';

    public function render()
    {
        $query = Hafalan::with('siswa.user')
            ->where('status', 'disetor')
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

        $this->responseHafalan = $query->orderBy('created_at', 'desc')->get();

        return view('livewire.guru.response-hafalan.show');
    }

    public function updateStatus($hafalanId, $status)
    {
        $hafalan = Hafalan::find($hafalanId);
        if ($hafalan) {
            $hafalan->status = $status;
            $hafalan->save();
            session()->flash('message', 'Status berhasil diupdate!');
        }
    }

    public function tandaiSiswa($hafalanId)
    {
        // Yang diubah yang disini
        $hafalan = Hafalan::with('siswa')->find($hafalanId);
        if ($hafalan) {
            $exists = SiswaTertanda::where('siswa_id', $hafalan->siswa_id)
                ->where('hafalan_id', $hafalanId)
                ->exists();

            if ($exists) {
                session()->flash('error', 'Hafalan siswa ini sudah ditandai sebelumnya!');
                return;
            }

            SiswaTertanda::create([
                'siswa_id' => $hafalan->siswa_id,
                'guru_id' => Auth::id(),
                'hafalan_id' => $hafalanId,
                'keterangan' => 'Ditandai dari response hafalan'
            ]);

            session()->flash('message', 'Siswa berhasil ditandai!');
        }
    }
}
