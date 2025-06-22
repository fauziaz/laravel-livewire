<?php

namespace App\Livewire\Lokasi;

use App\Models\Lokasi;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\View\View;

class Index extends Component
{
    use WithPagination;

    public string $search   = '';
    public int    $perPage  = 10;

    protected $queryString = [
        'search'  => ['except' => ''],
        'perPage' => ['except' => 10],
    ];

    // reset page saat search berubah
    public function updatingSearch(): void
    {
        $this->resetPage();
    }
    public function updatingPerPage(): void
    {
        $this->resetPage();
    }

    public function clearSearch(): void
    {
        $this->search = '';
        $this->resetPage();
    }

    public function render(): View
    {
        $lokasis = Lokasi::withCount('barangs')
            ->when($this->search, fn($q) => 
                $q->where('nama_lokasi', 'like', "%{$this->search}%")
                  ->orWhere('gedung', 'like', "%{$this->search}%")
            )
            ->orderBy('id', 'asc')
            ->paginate($this->perPage);

        return view('livewire.lokasi.index', compact('lokasis'));
    }
}