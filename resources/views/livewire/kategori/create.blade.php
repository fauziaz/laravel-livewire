{{-- resources/views/livewire/kategori/create.blade.php --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Buat Kategori
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg">
                <div class="px-6 py-6">
                    <form wire:submit.prevent="submit" class="space-y-6">
                        {{-- Nama Kategori --}}
                        <div class="grid grid-cols-1 gap-4">
                            <label for="nama_kategori" class="block text-sm font-medium text-gray-700">
                                Nama Kategori <span class="text-red-500">*</span>
                            </label>
                            <input
                                type="text"
                                id="nama_kategori"
                                wire:model.defer="nama_kategori"
                                placeholder="Masukkan nama kategori"
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-3 py-2 @error('nama_kategori') border-red-300 @enderror"
                            />
                            @error('nama_kategori')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tombol --}}
                        <div class="flex justify-end space-x-2">
                            <button
                                type="submit"
                                class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            >
                                Simpan
                            </button>
                            <a
                                href="{{ route('kategori.index') }}"
                                class="inline-flex items-center rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                            
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>