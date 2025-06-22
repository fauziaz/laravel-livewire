<?php

namespace App\Livewire\Kategori;

use App\Models\Kategori;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    #[Validate('required|string|max:255')]
    public string $nama_kategori = '';

    public function render()
    {
        return view('livewire.kategori.create');
    }

    public function submit()
    {
        $this->validate();

        Kategori::create([
            'nama_kategori' => $this->nama_kategori,
        ]);

        session()->flash('message', 'Kategori berhasil dibuat.');

        return redirect()->route('kategori.index');
    }
}