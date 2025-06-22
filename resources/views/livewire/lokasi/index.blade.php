    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Daftar Lokasi
            </h2>
            <a href="{{ route('lokasi.create') }}"
               class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 4v16m8-8H4"/>
                </svg>
                Tambah Lokasi
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Flash --}}
            @if(session('message'))
                <div class="rounded-md bg-green-50 p-4 flex items-center">
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293..."/>
                    </svg>
                    <p class="ml-3 text-sm text-green-800">{{ session('message') }}</p>
                </div>
            @endif

            {{-- Search & Per Page --}}
            <div class="bg-white shadow sm:rounded-lg p-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <input
                    type="text"
                    wire:model.debounce.300ms="search"
                    placeholder="Cari nama lokasi atau gedung..."
                    class="col-span-2 block w-full rounded-md border-gray-300 px-3 py-2"
                />

                <!-- <select wire:model="perPage"
                        class="block w-full rounded-md border-gray-300 px-3 py-2">
                    <option value="5">5 / halaman</option>
                    <option value="10">10 / halaman</option>
                    <option value="25">25 / halaman</option>
                    <option value="50">50 / halaman</option>
                </select> -->
            </div>

            {{-- Tabel --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    @if($lokasis->count())
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Lokasi</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gedung</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase"># Barang</th>
                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($lokasis as $lokasi)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $lokasi->id }}</td>
                                    <td class="px-6 py-4">{{ $lokasi->nama_lokasi }}</td>
                                    <td class="px-6 py-4">{{ $lokasi->gedung }}</td>
                                    <td class="px-6 py-4">{{ $lokasi->barangs_count }}</td>
                                    <td class="px-6 py-4 text-center">
                                        <div class="inline-flex space-x-2">
                                                {{-- Edit --}}
                                                <a href="{{ route('lokasi.edit', $lokasi->id) }}"
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
                                                    <button
                                                        type="button"
                                                        wire:click="deleteKategori({{ $lokasi->id }})"
                                                        wire:confirm="Yakin ingin menghapus lokasi ini?"
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
                                            </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-4 px-6 flex items-center justify-between">
                            <p class="text-sm text-gray-700">
                                Menampilkan {{ $lokasis->firstItem() }}–{{ $lokasis->lastItem() }} dari {{ $lokasis->total() }}
                            </p>
                            {{ $lokasis->links() }}
                        </div>
                    @else
                        <div class="py-12 text-center text-gray-500">
                            Belum ada lokasi.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>