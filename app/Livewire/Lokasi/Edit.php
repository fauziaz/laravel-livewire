<?php

namespace App\Livewire\Lokasi;

use App\Models\Lokasi;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Edit extends Component
{
    public int $lokasiId;

    #[Validate('required|string|max:255')]
    public string $nama_lokasi;

    #[Validate('required|string|max:255')]
    public string $gedung;

    public function mount(int $id)
    {
        $lokasi = Lokasi::findOrFail($id);

        $this->lokasiId     = $lokasi->id;
        $this->nama_lokasi  = $lokasi->nama_lokasi;
        $this->gedung       = $lokasi->gedung;
    }

    public function render()
    {
        return view('livewire.lokasi.edit');
    }

    public function update()
    {
        $this->validate();

        Lokasi::findOrFail($this->lokasiId)
            ->update([
                'nama_lokasi' => $this->nama_lokasi,
                'gedung'      => $this->gedung,
            ]);

        session()->flash('message', 'Lokasi berhasil diperbarui.');

        return redirect()->route('lokasi.index');
    }
}