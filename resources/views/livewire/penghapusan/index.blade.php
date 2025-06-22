{{-- resources/views/livewire/penghapusan/index.blade.php --}}

<x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Riwayat Penghapusan
            </h2>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Flash Messages --}}
            @if(session('message'))
                <div class="rounded-md bg-green-50 p-4 flex items-center">
                    <svg class="h-5 w-5 text-green-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 
                                 00-1.414-1.414L9 10.586l-2-2a1 1 0 
                                 00-1.414 1.414l2 2a1 1 0 
                                 001.414 0l4-4z"
                              clip-rule="evenodd"/>
                    </svg>
                    <p class="ml-3 text-sm font-medium text-green-800">{{ session('message') }}</p>
                </div>
            @elseif(session('error'))
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

            {{-- Search Input --}}
            <div class="bg-white shadow sm:rounded-lg p-6">
                <input
                    type="text"
                    wire:model.debounce.300ms="search"
                    placeholder="Cari barang atau alasan..."
                    class="block w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500 sm:text-sm px-3 py-2"
                />
            </div>

            {{-- Table --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    @if($penghapusans->count())
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Barang</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Alasan</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($penghapusans as $item)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $item->id }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $item->barang->nama ?? '-' }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $item->alasan }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ \Carbon\Carbon::parse($item->tanggal)->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 text-center">
                                            <button
                                                type="button"
                                                wire:click="delete({{ $item->id }})"
                                                wire:confirm="Yakin ingin menghapus penghapusan ini?"
                                                class="text-red-600 hover:text-red-900 p-1"
                                                title="Hapus">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                     class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                        <div class="px-6 py-3 bg-white border-t border-gray-200 flex items-center justify-between">
                            <p class="text-sm text-gray-700">
                                Menampilkan {{ $penghapusans->firstItem() }}-{{ $penghapusans->lastItem() }} dari {{ $penghapusans->total() }}
                            </p>
                            <div>{{ $penghapusans->links() }}</div>
                        </div>
                    @else
                        <div class="py-12 text-center text-gray-500">
                            Belum ada data penghapusan.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>