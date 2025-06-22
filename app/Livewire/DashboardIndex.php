<?php
namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class DashboardIndex extends Component
{
    public $report;

    public function mount()
    {
        $this->report = DB::table('barangs')
            ->join('lokasis',   'barangs.lokasi_id',   '=', 'lokasis.id')
            ->join('kategoris', 'barangs.kategori_id', '=', 'kategoris.id')
            ->select(
                'lokasis.nama_lokasi',
                'lokasis.gedung',
                'kategoris.nama_kategori',
                DB::raw('COUNT(barangs.id) as total_barang')
            )
            ->groupBy('lokasis.id','kategoris.id')
            ->orderBy('lokasis.nama_lokasi')
            ->orderBy('kategoris.nama_kategori')
            ->get();
    }

    public function render()
    {
        return view('dashboard', [
            'report' => $this->report,
        ]);
    }
}