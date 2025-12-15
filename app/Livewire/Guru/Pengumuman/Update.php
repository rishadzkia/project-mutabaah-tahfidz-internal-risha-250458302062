<?php

namespace App\Livewire\Guru\Pengumuman;

use Livewire\Component;
use App\Models\Pengumuman;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class Update extends Component
{
    #[Layout('components.layouts.base')]
    #[Title('Update Pengumuman')]
    public $itemId;  // ID pengumuman
    public $name;
    public $judul;
    public $isi;

    public function mount($id)
{
    $this->itemId = $id;
    $item = Pengumuman::findOrFail($id);

    $this->name = $item->guru->user->name;
    $this->judul = $item->judul;
    $this->isi = $item->isi;
}

    public function update()
    {
        $this->validate([
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
        ]);

        $item = Pengumuman::findOrFail($this->itemId);
        $item->update([
            'judul' => $this->judul,
            'isi' => $this->isi,
        ]);

        session()->flash('message', 'Pengumuman berhasil diupdate');

        return redirect()->route('guru.pengumuman'); // balik ke list pengumuman
    }

    public function render()
    {
        return view('livewire.guru.pengumuman.update');
    }
}
