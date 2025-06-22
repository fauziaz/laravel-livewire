<?php

namespace App\Models;
use App\Models\Barang;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\RiwayatMutasi;
use App\Models\Penghapusan; // ← HARUS ADA
use Illuminate\Database\Eloquent\Model;

class Penghapusan extends Model
{
    protected $fillable = ['barang_id', 'alasan', 'tanggal'];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
}