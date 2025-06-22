<?php

namespace App\Livewire\RiwayatMutasi;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\RiwayatMutasi;
use App\Models\Barang;
use App\Models\Lokasi;

class Index extends Component
{
    use WithPagination;

    public string $search = '';

    protected $paginationTheme = 'tailwind';

    protected $queryString = [
        'search' => ['except' => ''],
        'page'   => ['except' => 1],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function deleteMutasi(int $id)
    {
        $record = RiwayatMutasi::find($id);

        if (! $record) {
            return session()->flash('error', 'Data mutasi tidak ditemukan.');
        }

        $record->delete();

        session()->flash('message', 'Mutasi berhasil dihapus.');
    }

    public function render()
    {
        $riwayatmutasi = RiwayatMutasi::with('barang')
            ->when($this->search, fn($q) =>
                $q->whereHas('barang', fn($qb) =>
                    $qb->where('nama', 'like', '%'.$this->search.'%')
                )->orWhere('asal', 'like', '%'.$this->search.'%')
                 ->orWhere('tujuan', 'like', '%'.$this->search.'%')
            )
            ->paginate(10);

        return view('livewire.riwayat-mutasi.index', compact('riwayatmutasi'));
    }
}