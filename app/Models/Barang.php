<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $fillable = ['nama', 'kode_barang', 'kategori_id', 'lokasi_id', 'jumlah'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }

    public function riwayatMutasis()
    {
        return $this->hasMany(RiwayatMutasi::class);
    }

    public function riwayatMutasiTerakhir()
    {
        return $this->hasOne(RiwayatMutasi::class)->latestOfMany();
    }

    public function penghapusan()
    {
        return $this->hasMany(Penghapusan::class);
    }
}