  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Laporan Barang per Lokasi & Kategori') }}
    </h2>
  </x-slot>

  <div class="py-6 max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
    <div class="bg-white shadow sm:rounded-lg p-6">
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Lokasi</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
              <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Jumlah Barang</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @forelse($report as $row)
              <tr>
                <td class="px-6 py-4 text-sm text-gray-900">{{ $row->nama_lokasi }} - {{ $row->gedung }}</td>
                <td class="px-6 py-4 text-sm text-gray-900">{{ $row->nama_kategori }}</td>
                <td class="px-6 py-4 text-sm text-gray-900 text-right">{{ $row->total_barang }}</td>
              </tr>
            @empty
              <tr>
                <td colspan="3" class="px-6 py-4 text-center text-gray-500">Belum ada data barang.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>