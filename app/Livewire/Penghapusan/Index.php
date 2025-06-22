<?php

namespace App\Livewire\Penghapusan;

use App\Models\Penghapusan;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\View\View;

class Index extends Component
{
    use WithPagination;

    public string $search = '';
    public int    $perPage = 10;

    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function render(): View
    {
        $penghapusans = Penghapusan::with('barang')
            ->when($this->search, fn($q) =>
                $q->whereHas('barang', fn($qb) =>
                    $qb->where('nama', 'like', '%'.$this->search.'%')
                )->orWhere('alasan', 'like', '%'.$this->search.'%')
            )
            ->latest()
            ->paginate($this->perPage);

        return view('livewire.penghapusan.index', compact('penghapusans'));
    }

    public function delete(int $id): void
    {
        $item = Penghapusan::find($id);

        if (! $item) {
            session()->flash('error', 'Data penghapusan tidak ditemukan.');
            return;
        }

        $item->delete();
        session()->flash('message', 'Data penghapusan berhasil dihapus.');
    }
}