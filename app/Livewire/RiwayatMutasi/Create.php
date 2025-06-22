<?php

namespace App\Livewire\RiwayatMutasi;

use Livewire\Component;
use App\Models\RiwayatMutasi;
use App\Models\Barang;
use App\Models\Lokasi;

class Create extends Component
{
    public $barang_id, $asal, $tujuan, $status = 'Mutasi';
    public $barangs = [], $lokasis = [];
    public $statusOptions = ['Mutasi','Selesai'];

    public function mount()
    {
        $this->barangs  = Barang::pluck('nama','id')->toArray();
        $this->lokasis  = Lokasi::orderBy('nama_lokasi')->get();
    }

    protected function rules(): array
    {
        return [
            'barang_id'    => 'required|exists:barangs,id',
            'asal'         => 'required|exists:lokasis,id',
            'tujuan'       => 'required|exists:lokasis,id|different:asal',
            // 'tanggal'      => 'required|date',
            'status'       => 'required|in:Mutasi,Selesai',
        ];
    }

    public function submit()
    {
        $this->validate();

        RiwayatMutasi::create([
        'barang_id' => $this->barang_id,
        'asal'      => $this->asal,
        'tujuan'    => $this->tujuan,
        // 'tanggal'   => $this->tanggal,
        'status'     => $this->status,                      // simpan status string
        ]);

        session()->flash('message', 'Mutasi berhasil disimpan.');
        return redirect()->route('riwayat-mutasi.index');
    }

    public function render()
    {
        return view('livewire.riwayat-mutasi.create');
    }
}