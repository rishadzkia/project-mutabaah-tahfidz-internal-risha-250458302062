<?php

namespace App\Livewire\Siswa\InputHafalan;

use Livewire\Component;
use App\Models\Hafalan;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class Update extends Component
{
    #[Layout('components.layouts.base')]
    #[Title('Update Hafalan')]
    public $itemId;
    public $name;
    public $surah;
    public $juz;
    public $ayat;

    public function mount($id)
    {
        $this->itemId = $id;
        $item = Hafalan::findOrFail($id);

        $this->name = $item->siswa->user->name;
        $this->surah = $item->surah;
        $this->juz = $item->juz;
        $this->ayat = $item->ayat;
    }

    public function update()
    {
        // $this->validate([
        //     'judul' => 'required|string|max:255',
        //     'isi' => 'required|string',
        // ]);

        $item = Hafalan::findOrFail($this->itemId);
        $item->update([
            'surah' => $this->surah,
            'juz' => $this->juz,
        ]);

        session()->flash('message', 'Hafalan berhasil diupdate');

        return redirect()->route('siswa.show-hafalan');
    }

    public function render()
    {
        return view('livewire.siswa.input-hafalan.update');
    }
}
