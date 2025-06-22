<?php

namespace App\Livewire\Lokasi;

use App\Models\Lokasi;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate('required|string|max:255')]
    public string $nama_lokasi = '';

    #[Validate('required|string|max:255')]
    public string $gedung = '';

    public function render()
    {
        return view('livewire.lokasi.create');
    }

    public function submit()
    {
        $this->validate();

        Lokasi::create([
            'nama_lokasi' => $this->nama_lokasi,
            'gedung'       => $this->gedung,
        ]);

        session()->flash('message', 'Lokasi berhasil dibuat.');

        return redirect()->route('lokasi.index');
    }
}