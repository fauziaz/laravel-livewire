<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatMutasi extends Model
{
    // Nama tabel, kalau kamu menggunakan nama default "riwayat_mutasis" bisa dihapus
    protected $table = 'riwayat_mutasis';

    // Kolom‐kolom yang boleh di‐mass assign
    protected $fillable = [
        'barang_id',
        'asal',
        'tujuan',
        // 'tanggal',
        'status',
    ];

    /**
     * Relasi ke model Barang.
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    /**
     * Relasi ke model Lokasi untuk lokasi asal.
     */
    public function lokasiAsal()
    {
        return $this->belongsTo(Lokasi::class, 'asal');
    }

    /**
     * Relasi ke model Lokasi untuk lokasi tujuan.
     */
    public function lokasiTujuan()
    {
        return $this->belongsTo(Lokasi::class, 'tujuan');
    }
}