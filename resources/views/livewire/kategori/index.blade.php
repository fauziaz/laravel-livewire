{{-- resources/views/livewire/kategori/index.blade.php --}}
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Daftar Kategori
            </h2>
            <a href="{{ route('kategori.create') }}"
               class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Kategori
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Flash Messages --}}
            @if(session()->has('message'))
                <div class="rounded-md bg-green-50 p-4 flex items-center">
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 
                                 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 
                                 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd"/>
                    </svg>
                    <p class="ml-3 text-sm font-medium text-green-800">{{ session('message') }}</p>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="rounded-md bg-red-50 p-4 flex items-center">
                    <svg class="h-5 w-5 text-red-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 
                                 00-1.414 1.414L9 10.586l-1.293 1.293a1 1 0 
                                 101.414 1.414L10 11.414l1.293 1.293a1 1 0 
                                 001.414-1.414L11.414 10l1.293-1.293a1 1 0 
                                 00-1.414-1.414L10 8.586 8.707 7.293z"
                              clip-rule="evenodd"/>
                    </svg>
                    <p class="ml-3 text-sm font-medium text-red-800">{{ session('error') }}</p>
                </div>
            @endif

            {{-- Search Form --}}
            <div class="bg-white shadow sm:rounded-lg p-6">
                <input 
                    type="text" 
                    wire:model.debounce.300ms="search" 
                    placeholder="Cari Kategori..." 
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm px-3 py-2"
                />
            </div>

            {{-- Table --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    @if($kategori->count())
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($kategori as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $item->nama_kategori }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 text-center">
                                            <div class="inline-flex space-x-2">
                                                {{-- Edit --}}
                                                <a href="{{ route('kategori.edit', $item->id) }}"
                                                   class="text-indigo-600 hover:text-indigo-900 p-1"
                                                   title="Edit">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                         class="h-5 w-5"
                                                         viewBox="0 0 20 20"
                                                         fill="currentColor">
                                                        <path d="M17.414 2.586a2 2 0 010 
                                                            2.828l-9.793 9.793a1 1 0 
                                                            01-.464.263l-4 1a1 1 0 
                                                            01-1.213-1.213l1-4a1 1 0 
                                                            01.263-.464l9.793-9.793a2 2 0 012.828 0z"/>
                                                    </svg>
                                                </a>
                                                {{-- Delete --}}
                                                @if(($item->barangs_count ?? $item->barangs->count()) == 0)
                                                    <button
                                                        type="button"
                                                        wire:click="deleteKategori({{ $item->id }})"
                                                        wire:confirm="Yakin ingin menghapus kategori ini?"
                                                        class="text-red-600 hover:text-red-900 p-1"
                                                        title="Hapus">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="h-5 w-5"
                                                             viewBox="0 0 20 20"
                                                             fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                  d="M9 2a1 1 0 00-1 1v1H5a1 1 0 
                                                                     000 2h.293l.853 9.41A2 2 0 
                                                                     008.147 17h3.706a2 2 0 
                                                                     001.999-1.59l.853-9.41H15a1 1 0 
                                                                     100-2h-3V3a1 1 0 
                                                                     00-1-1H9zm1 4a1 1 0 
                                                                     00-1 1v7a1 1 0 102 0V7a1 1 0 
                                                                     00-1-1z"
                                                                  clip-rule="evenodd"/>
                                                        </svg>
                                                    </button>
                                                @else
                                                    <button type="button"
                                                            disabled
                                                            class="text-gray-400 p-1 cursor-not-allowed"
                                                            title="Tidak bisa hapus, kategori memiliki barang">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                             class="h-5 w-5"
                                                             viewBox="0 0 20 20"
                                                             fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                  d="M9 2a1 1 0 00-1 1v1H5a1 1 0 
                                                                     000 2h.293l.853 9.41A2 2 0 
                                                                     008.147 17h3.706a2 2 0 
                                                                     001.999-1.59l.853-9.41H15a1 1 0 
                                                                     100-2h-3V3a1 1 0 
                                                                     00-1-1H9zm1 4a1 1 0 
                                                                     00-1 1v7a1 1 0 102 0V7a1 1 0 
                                                                     00-1-1z"
                                                                  clip-rule="evenodd"/>
                                                        </svg>
                                                    </button>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- Pagination --}}
                        <div class="px-6 py-3 bg-white border-t border-gray-200 flex items-center justify-between">
                            <p class="text-sm text-gray-700">
                                Menampilkan {{ $kategori->firstItem() }}-{{ $kategori->lastItem() }} dari {{ $kategori->total() }}
                            </p>
                            <div>
                                {{ $kategori->links() }}
                            </div>
                        </div>
                    @else
                        <div class="py-12 text-center">
                            <p class="text-gray-500 mb-4">Belum ada kategori.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>