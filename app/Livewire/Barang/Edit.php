<?php

namespace App\Livewire\Barang;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Barang;
use App\Models\Penghapusan;
use Illuminate\Support\Facades\DB;


class Edit extends Component
{
    public $barangId, $nama, $kode_barang, $kategori_id, $lokasi_id, $jumlah;

    public function mount($id)
    {
        $barang = Barang::findOrFail($id);
        $this->barangId = $barang->id;
        $this->nama = $barang->nama;
        $this->kode_barang = $barang->kode_barang;
        $this->kategori_id = $barang->kategori_id;
        $this->lokasi_id = $barang->lokasi_id;
        $this->jumlah = $barang->jumlah;
    }

    public function update()
    {
        $this->validate([
            'nama' => 'required',
            'kode_barang' => 'required',
            'kategori_id' => 'required',
            'lokasi_id' => 'required',
            'jumlah' => 'required|integer',
        ]);

        $barang = Barang::findOrFail($this->barangId);
        $barang->update([
            'nama' => $this->nama,
            'kode_barang' => $this->kode_barang,
            'kategori_id' => $this->kategori_id,
            'lokasi_id' => $this->lokasi_id,
            'jumlah' => $this->jumlah,
        ]);

        session()->flash('success', 'Data barang berhasil diperbarui.');
        return redirect()->route('barang.index');
    }

    public function render()
    {
        return view('livewire.barang.edit', [
            'kategoris' => Kategori::all(),
            'lokasis' => Lokasi::all(),
        ])->layout('layouts.app');
    }
}