<?php

namespace App\Livewire\Siswa\KomentarPengumuman;

use App\Models\KomentarPengumuman;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Auth;  
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Show extends Component  
{
    #[Layout('components.layouts.base')]
    #[Title('Halaman Pengumuman')]
    public $komentar;
    public $pengumuman_id;
    public $deleteId = null;   
    public function mount()
    {
        $this->komentar = '';
    }

    public function render() 
    { 
        // Pengumuman hanya tampil 2 hari terakhir
        $pengumumans = Pengumuman::where('created_at', '>=', now()->subDays(2))
            ->orderBy('created_at', 'desc')
            ->get();

        $komentars = KomentarPengumuman::with('siswa.user')
            ->when($this->pengumuman_id, function ($query) {
                $query->where('pengumuman_id', $this->pengumuman_id);
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('livewire.siswa.komentar-pengumuman.show', [
            'pengumumans' => $pengumumans,
            'komentars' => $komentars, 
        ]);
    } 


    public function create()
    {
        $this->validate([
            'komentar' => 'required|string|max:1000',
        ]);

        if (!$this->pengumuman_id) {
            session()->flash('error', 'Terjadi kesalahan: pengumuman tidak diketahui.');
            return;
        }

        $user = Auth::user();
        if (!$user || !$user->siswa) {
            session()->flash('error', 'Anda belum terdaftar sebagai siswa.');
            return;
        }

        KomentarPengumuman::create([
            'siswa_id' => $user->siswa->id,
            'pengumuman_id' => $this->pengumuman_id,
            'komentar' => $this->komentar,
        ]);

        $this->komentar = '';
        session()->flash('message', 'Komentar berhasil ditambahkan!');
        return redirect()->route('siswa.show-komentar');  
    }

    public function confirmDelete($id)
    { 
        $this->deleteId = $id; 
    }

    public function deleteKomentar($id)
    {
        $komentar = KomentarPengumuman::findOrFail($id); 

        $user = Auth::user(); 
        $siswa_id = $user->siswa->id ?? null; 

        if ($komentar && $siswa_id && $komentar->siswa_id === $siswa_id) {
            $komentar->delete();
            session()->flash('success', 'Komentar berhasil dihapus!');
        }
        return redirect()->route('siswa.show-komentar');

        
    }
}
