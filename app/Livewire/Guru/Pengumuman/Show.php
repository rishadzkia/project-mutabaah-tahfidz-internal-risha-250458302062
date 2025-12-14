<?php

namespace App\Livewire\Guru\Pengumuman;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Show extends Component
{
    #[Layout('components.layouts.base')]
    #[Title('Halaman Pengumuman')]
    public $pengumuman;
    public function render()
    {
        $pengumuman = Pengumuman::where('created_at', '>=', now()->subDays(2))
            ->get();
        $pengumuman = Pengumuman::all();
        return view('livewire.guru.pengumuman.show', [
            'pengumuman' => $pengumuman,
        ]);
    }
    public function mount()
    {
        $this->pengumuman = Pengumuman::with(['guru.user'])
            ->where('created_at', '>=', now()->subDays(2))
            ->get();
    }

    public function destroy($id) 
    {
        $pengumuman = Pengumuman::findOrFail($id);
        $pengumuman->delete();

        session()->flash('success', 'Data berhasil dihapus');

     
        $this->pengumuman = Pengumuman::with(['guru.user'])->get();
    }
}
