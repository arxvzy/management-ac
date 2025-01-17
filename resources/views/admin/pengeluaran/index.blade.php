@extends('layouts.admin')
@section('title', 'Pengeluaran')
@section('content')
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Pengeluaran
        </h2>
        @if (session()->has('success'))
            <x-alert>Pengeluaran</x-alert>
        @endif
        <h4 class="mt-4 text-lg font-semibold">
            <x-button class="py-2" href="{{ route('admin.pengeluaran.tambah') }}">Tambah</x-button>
        </h4>

        <table id="pengeluaranTable" class="display dark:text-gray-400">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th>Pengguna</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                    <th>Tanggal Pembelian</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($pengeluarans as $pengeluaran)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td>{{ $pengeluaran->pengguna->nama }}</td>
                        <td>{{ $pengeluaran->keterangan }}</td>
                        <td>Rp {{ number_format($pengeluaran->nominal) }}</td>
                        <td data-order="{{ \Carbon\Carbon::parse($pengeluaran->tgl_pembelian)->format('Y-m-d H:i:s') }}">
                            {{ \Carbon\Carbon::parse($pengeluaran->tgl_pembelian)->translatedFormat('l, j F Y H:i') }}
                        </td>
                        <td>
                            <a href="{{ route('admin.pengeluaran.index') }}"
                                class="flex items-center justify-start px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                aria-label="Edit">
                                <x-heroicon-s-information-circle class="w-5 h-5" />
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#pengeluaranTable').DataTable({
                info: false,
                responsive: true,
                paging: false,
                order: [3, 'desc'],
                columnDefs: [{
                    targets: [4],
                    orderable: false,
                }, ],
            });
        });
    </script>
@endsection
