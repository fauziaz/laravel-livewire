{{-- resources/views/livewire/lokasi/edit.blade.php --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Lokasi
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="px-6 py-6">
                    <form wire:submit.prevent="update" class="space-y-6">
                        {{-- Nama Lokasi --}}
                        <div class="grid grid-cols-1 gap-4">
                            <label for="nama_lokasi" class="block text-sm font-medium text-gray-700">
                                Nama Lokasi <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="nama_lokasi"
                                wire:model.defer="nama_lokasi"
                                placeholder="Masukkan nama lokasi"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-3 py-2 @error('nama_lokasi') border-red-300 @enderror"
                            />
                            @error('nama_lokasi')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Gedung --}}
                        <div class="grid grid-cols-1 gap-4">
                            <label for="gedung" class="block text-sm font-medium text-gray-700">
                                Gedung <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="gedung"
                                wire:model.defer="gedung"
                                placeholder="Masukkan nama gedung"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-3 py-2 @error('gedung') border-red-300 @enderror"
                            />
                            @error('gedung')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tombol --}}
                        <div class="flex justify-end space-x-2">
                            <button
                                type="submit"
                                class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            >
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M5 13l4 4L19 7"/>
                                </svg>
                                Perbarui
                            </button>
                            <a
                                href="{{ route('lokasi.index') }}"
                                class="inline-flex items-center rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                            
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>