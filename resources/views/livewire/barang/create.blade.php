{{-- resources/views/livewire/barang/create.blade.php --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Tambah Data Barang
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="px-6 py-6">
                    <form wire:submit.prevent="store" class="space-y-6">
                        {{-- Nama --}}
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                            <label for="nama" class="text-sm font-medium text-gray-700">Nama</label>
                            <div class="sm:col-span-2">
                                <input
                                    type="text"
                                    id="nama"
                                    wire:model.defer="nama"
                                    placeholder="Nama Barang"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                >
                                @error('nama')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        {{-- Kode Barang --}}
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                            <label for="kode_barang" class="text-sm font-medium text-gray-700">Kode Barang</label>
                            <div class="sm:col-span-2">
                                <input
                                    type="text"
                                    id="kode_barang"
                                    wire:model.defer="kode_barang"
                                    placeholder="Kode Barang"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                >
                                @error('kode_barang')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        {{-- Kategori --}}
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                            <label for="kategori_id" class="text-sm font-medium text-gray-700">Kategori</label>
                            <div class="sm:col-span-2">
                                <select
                                    id="kategori_id"
                                    wire:model.defer="kategori_id"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                >
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                    @endforeach
                                </select>
                                @error('kategori_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        {{-- Lokasi --}}
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                            <label for="lokasi_id" class="text-sm font-medium text-gray-700">Lokasi</label>
                            <div class="sm:col-span-2">
                                <select
                                    id="lokasi_id"
                                    wire:model.defer="lokasi_id"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                >
                                    <option value="">-- Pilih Lokasi --</option>
                                    @foreach($lokasis as $lokasi)
                                        <option value="{{ $lokasi->id }}">
                                            {{ $lokasi->nama_lokasi }} - Gedung {{ $lokasi->gedung }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('lokasi_id')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        {{-- Jumlah --}}
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                            <label for="jumlah" class="text-sm font-medium text-gray-700">Jumlah</label>
                            <div class="sm:col-span-2">
                                <input
                                    type="number"
                                    id="jumlah"
                                    wire:model.defer="jumlah"
                                    min="0"
                                    placeholder="Jumlah"
                                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                >
                                @error('jumlah')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                            </div>
                        </div>

                        {{-- Tombol Simpan --}}
                        <div class="flex justify-end space-x-2">
                            <button
                                type="submit"
                                class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            >
                                Simpan
                            </button>
                            <a
                                href="{{ route('barang.index') }}"
                                class="inline-flex items-center rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                            
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>