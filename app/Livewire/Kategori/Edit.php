<?php
namespace App\Livewire\Kategori;

use App\Models\Kategori;
use Livewire\Component;

class Edit extends Component
{
    public $kategori_id;
    public $nama_kategori;

    public function mount($id)
    {
        $kategori = Kategori::findOrFail($id);
        $this->kategori_id = $kategori->id;
        $this->nama_kategori = $kategori->nama_kategori;
    }

    public function update()
    {
        $this->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);

        Kategori::where('id', $this->kategori_id)->update([
            'nama_kategori' => $this->nama_kategori,
        ]);

        return redirect()->route('kategori.index');
    }

    public function render()
    {
        return view('livewire.kategori.edit');
    }
}
