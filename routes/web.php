<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\DashboardIndex;
use App\Livewire\Barang\Index as BarangIndex;
use App\Livewire\Barang\Create as BarangCreate;
use App\Livewire\Barang\Edit   as BarangEdit;
use App\Livewire\Kategori\Index as KategoriIndex;
use App\Livewire\Kategori\Create as KategoriCreate;
use App\Livewire\Kategori\Edit   as KategoriEdit;
use App\Livewire\Lokasi\Index as LokasiIndex;
use App\Livewire\Lokasi\Create as LokasiCreate;
use App\Livewire\Lokasi\Edit   as LokasiEdit;
use App\Livewire\Penghapusan\Index as PenghapusanIndex;
use App\Livewire\RiwayatMutasi\Index as MutasiIndex;
use App\Livewire\RiwayatMutasi\Create as MutasiCreate;
use App\Livewire\RiwayatMutasi\Edit   as MutasiEdit;

Route::get('/', fn() => redirect()->route('dashboard'))
    ->middleware(['auth','verified'])
    ->name('home');

Route::get('/dashboard', DashboardIndex::class)
    ->middleware(['auth','verified'])
    ->name('dashboard');

Route::get('/profile', fn() => view('profile'))
    ->middleware('auth')
    ->name('profile');

// Barang
Route::get('/barang',          BarangIndex::class)->name('barang.index');
Route::get('/barang/create',   BarangCreate::class)->name('barang.create');
Route::get('/barang/{id}/edit',BarangEdit::class)->name('barang.edit');

// Kategori
Route::get('/kategori',          KategoriIndex::class)->name('kategori.index');
Route::get('/kategori/create',   KategoriCreate::class)->name('kategori.create');
Route::get('/kategori/{id}/edit',KategoriEdit::class)->name('kategori.edit');

// Lokasi
Route::get('/lokasi',          LokasiIndex::class)->name('lokasi.index');
Route::get('/lokasi/create',   LokasiCreate::class)->name('lokasi.create');
Route::get('/lokasi/{id}/edit',LokasiEdit::class)->name('lokasi.edit');

// Penghapusan
Route::get('/penghapusan', PenghapusanIndex::class)->name('penghapusan.index');

// Mutasi
Route::get('/riwayat-mutasi',          MutasiIndex::class)->name('riwayat-mutasi.index');
Route::get('/riwayat-mutasi/create',   MutasiCreate::class)->name('riwayat-mutasi.create');
Route::get('/riwayat-mutasi/{id}/edit',MutasiEdit::class)->name('riwayat-mutasi.edit');

require __DIR__.'/auth.php';