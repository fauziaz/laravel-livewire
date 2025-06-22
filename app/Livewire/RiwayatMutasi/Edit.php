<?php

namespace App\Livewire\RiwayatMutasi;

use Livewire\Component;
use App\Models\RiwayatMutasi;
use App\Models\Barang;
use App\Models\Lokasi;

class Edit extends Component
{
    public $riwayatMutasiId;
    public $barang_id, $asal, $tujuan, $status;
    public $barangs = [], $lokasis = [];
    public $statusOptions = ['Mutasi', 'Selesai'];

    public function mount($id)
    {
        $this->riwayatMutasiId = $id;

        $mutasi = RiwayatMutasi::findOrFail($id);

        $this->barang_id = $mutasi->barang_id;
        $this->asal      = $mutasi->asal;
        $this->tujuan    = $mutasi->tujuan;
        $this->status    = $mutasi->status;

        $this->barangs   = Barang::pluck('nama', 'id')->toArray();
        $this->lokasis   = Lokasi::orderBy('nama_lokasi')->get();
    }

    protected function rules(): array
    {
        return [
            'barang_id' => 'required|exists:barangs,id',
            'asal'      => 'required|exists:lokasis,id',
            'tujuan'    => 'required|exists:lokasis,id|different:asal',
            'status'    => 'required|in:Mutasi,Selesai',
        ];
    }

    public function update()
    {
        $this->validate();

        $mutasi = RiwayatMutasi::findOrFail($this->riwayatMutasiId);

        $mutasi->update([
            'barang_id' => $this->barang_id,
            'asal'      => $this->asal,
            'tujuan'    => $this->tujuan,
            'status'    => $this->status,
        ]);

        session()->flash('message', 'Mutasi berhasil diperbarui.');
        return redirect()->route('riwayat-mutasi.index');
    }

    public function render()
    {
        return view('livewire.riwayat-mutasi.edit');
    }
}