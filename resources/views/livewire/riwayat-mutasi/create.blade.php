{{-- resources/views/livewire/riwaya-tmutasi/create.blade.php --}}
<x-slot name="header">
  <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Tambah Mutasi
  </h2>
</x-slot>

<div class="py-6 max-w-md mx-auto sm:px-6 lg:px-8">
  <div class="bg-white shadow sm:rounded-lg p-6">
    <form wire:submit.prevent="submit" class="space-y-4">

      {{-- Barang --}}
      <div>
        <label class="block text-sm font-medium text-gray-700">Barang</label>
        <select wire:model="barang_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
          <option value="">-- Pilih Barang --</option>
          @foreach($barangs as $id => $nama)
            <option value="{{ $id }}">{{ $nama }}</option>
          @endforeach
        </select>
        @error('barang_id')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
      </div>

      {{-- Asal --}}
      <div>
        <label class="block text-sm font-medium text-gray-700">Asal</label>
        <select wire:model="asal" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
          <option value="">-- Pilih Lokasi Asal --</option>
          @foreach($lokasis as $lok)
            <option value="{{ $lok->id }}">{{ $lok->nama_lokasi }} — Gedung {{ $lok->gedung }}</option>
          @endforeach
        </select>
        @error('asal')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
      </div>

      {{-- Tujuan --}}
      <div>
        <label class="block text-sm font-medium text-gray-700">Tujuan</label>
        <select wire:model="tujuan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
          <option value="">-- Pilih Lokasi Tujuan --</option>
          @foreach($lokasis as $lok)
            <option value="{{ $lok->id }}">{{ $lok->nama_lokasi }} — Gedung {{ $lok->gedung }}</option>
          @endforeach
        </select>
        @error('tujuan')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
      </div>

      {{-- Status --}}
      <div>
        <label class="block text-sm font-medium text-gray-700">Status</label>
        <select wire:model="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
          <option value="">-- Pilih Status --</option>
          @foreach($statusOptions as $opt)
            <option value="{{ $opt }}">{{ $opt }}</option>
          @endforeach
        </select>
        @error('status')<p class="text-sm text-red-600 mt-1">{{ $message }}</p>@enderror
      </div>

      {{-- Tombol Aksi --}}
      <div class="flex justify-end space-x-2 pt-4">
        <a
          href="{{ route('riwayat-mutasi.index') }}"
          class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-500"
        >
          Batal
        </a>

        <button
          type="submit"
          class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
          <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
          </svg>
          Simpan
        </button>
      </div>

    </form>
  </div>
</div>
