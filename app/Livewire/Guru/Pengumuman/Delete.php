<?php

namespace App\Livewire\Guru\Pengumuman;

use Livewire\Component;
use App\Models\Pengumuman;
use Livewire\Attributes\Title;

class Delete extends Component

{
    #[Title('Hapus Pengumuman')]
    public $show = false;
    public $itemId;
    public $judul;

    protected $listeners = ['openDeleteModal' => 'open'];

    public function open($id)
    {
        $data = Pengumuman::find($id);

        if ($data) {
            $this->itemId = $id;
            $this->judul = $data->judul;
            $this->show = true;
        }
    }

    public function delete()
    {
        Pengumuman::find($this->itemId)?->delete();

        $this->show = false;
        $this->dispatch('pengumumanDeleted');
    }

    public function render()
    {
        return view('livewire.guru.pengumuman.delete');
    }
}
