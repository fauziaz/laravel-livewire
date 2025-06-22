<?php

namespace App\Livewire\Kategori;

use App\Models\Kategori;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public function applySearch()
    {
        $this->resetPage();
    }
    protected $queryString = [
        'search' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render(): View
    {
        $kategori = Kategori::when($this->search, function ($query) {
                $query->where('nama_kategori', 'like', '%' . $this->search . '%');
            })
            ->orderBy('id', 'asc')
            ->paginate($this->perPage);

        return view('livewire.kategori.index', compact('kategori'));
    }

    public function deleteKategori($id)
    {
        $item = Kategori::find($id);

        if (! $item) {
            session()->flash('error', 'Kategori tidak ditemukan.');
            return;
        }

        $item->delete();
        session()->flash('message', 'Kategori berhasil dihapus.');
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->resetPage();
    }
}