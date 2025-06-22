<?php

namespace App\Livewire\Barang;

use Livewire\Component;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;

class Create extends Component
{
    public $nama, $kode_barang, $kategori_id, $lokasi_id, $jumlah;

    public function store()
    {
        $this->validate([
            'nama' => 'required',
            'kode_barang' => 'required',
            'kategori_id' => 'required',
            'lokasi_id' => 'required',
            'jumlah' => 'required|integer',
        ]);

        Barang::create([
            'nama' => $this->nama,
            'kode_barang' => $this->kode_barang,
            'kategori_id' => $this->kategori_id,
            'lokasi_id' => $this->lokasi_id,
            'jumlah' => $this->jumlah,
        ]);

        session()->flash('success', 'Data barang berhasil ditambahkan.');
        return redirect()->route('barang.index');
    }

    public function render()
    {
        return view('livewire.barang.create', [
            'kategoris' => Kategori::all(),
            'lokasis' => Lokasi::all(),
        ])->layout('layouts.app');
    }
}