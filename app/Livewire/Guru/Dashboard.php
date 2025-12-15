<?php

namespace App\Livewire\Guru;

use App\Models\Hafalan;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('components.layouts.base')]
    #[Title('Dashboard Guru')]
    public $percentageDaily = [];

    public function mount()
    {
        $totalSiswa = Siswa::count();

        // Buat list 7 hari terakhir dari hari ini mundur ke 6 hari sebelumnya
        $days = collect();
        for ($i = 6; $i >= 0; $i--) {
            $days->push(now()->subDays($i)->format('Y-m-d'));
        }

        // Ambil data hafalan: hitung siswa unik per hari
        $data = Hafalan::select(
            DB::raw('DATE(created_at) as tgl'),
            DB::raw('COUNT(DISTINCT siswa_id) as total_siswa_setor')
        )
            ->whereBetween('created_at', [
                now()->subDays(6)->startOfDay(),
                now()->endOfDay()
            ])
            ->groupBy('tgl')
            ->orderBy('tgl', 'ASC')
            ->get()
            ->keyBy('tgl');

        // Gabungkan dengan hari-hari yang tidak ada datanya
        $this->percentageDaily = $days->map(function ($tanggal) use ($data, $totalSiswa) {

            // Ambil jumlah siswa yang setor pada hari ini
            $jumlahSetor = $data[$tanggal]->total_siswa_setor ?? 0;

            // Hitung persentase
            $percentage = ($totalSiswa > 0)
                ? round(($jumlahSetor / $totalSiswa) * 100)
                : 0;

            return [
                'tgl' => $tanggal,
                'persen' => $percentage,
            ];
        });
    }

    public function render()
    {
        return view('livewire.guru.dashboard');
    }
}
