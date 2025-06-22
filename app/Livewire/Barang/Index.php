<?php

namespace App\Livewire\Barang;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Barang;
use App\Models\Penghapusan;

class Index extends Component
{
    use WithPagination;

    public $search  = '';
    public $sortBy  = 'nama';
    public $sortDir = 'asc';
    public $perPage = 10;

    protected $queryString = ['search'];

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDir = $this->sortDir === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy  = $field;
            $this->sortDir = 'asc';
        }

        $this->resetPage();
    }

    public function destroy($id)
    {
        $barang = Barang::with(['riwayatMutasis'])->find($id);

        if (! $barang) {
            session()->flash('error', 'Barang tidak ditemukan.');
            return;
        }

        $adaMutasiAktif = $barang->riwayatMutasis->contains(fn($mutasi) => $mutasi->status === 'Mutasi');

        if ($adaMutasiAktif) {
            session()->flash('error', 'Tidak bisa menghapus: barang sedang dalam mutasi.');
            return;
        }

        // Simpan riwayat penghapusan
        $penghapusan = Penghapusan::create([
            'barang_id' => $barang->id,
            'alasan'    => 'Penghapusan manual oleh admin',
            'tanggal'   => now(),
        ]);

        // Hapus barang
        $barang->delete();

        session()->flash('message', 'Barang berhasil dihapus dan dicatat ke riwayat penghapusan.');
    }


    public function render()
    {
        $dataBarang = Barang::with(['kategori', 'lokasi', 'riwayatMutasis', 'riwayatMutasiTerakhir'])
            ->when($this->search, fn($q) =>
                $q->where('nama', 'like', '%'.$this->search.'%')
                ->orWhere('kode_barang', 'like', '%'.$this->search.'%')
            )
            ->orderBy($this->sortBy, $this->sortDir)
            ->paginate($this->perPage);


        return view('livewire.barang.index', compact('dataBarang'));
    }
}