@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Dashboard
        </h2>

        <!-- Cards -->
        <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total Pelanggan
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $pelanggan }}
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total Pemasukkan
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        Rp {{ number_format($pemasukan) }}
                    </p>
                </div>
            </div>
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total Pengeluaran
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        Rp {{ number_format(collect($pengeluarans)->sum('nominal')) }}
                    </p>
                </div>
            </div>
            <!-- Card -->
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Total Order
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ count($orders) }}
                    </p>
                </div>
            </div>
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Order Selesai
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ count($orders->where('status', 'Selesai')) }}
                    </p>
                </div>
            </div>
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Order Batal
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ count($orders->where('status', 'Batal')) }}
                    </p>
                </div>
            </div>
        </div>

        <h3 class="mt-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Pemasukan
        </h3>
        <!-- New Table -->
        <table id="historyTable" class="display dark:text-gray-400">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th>Nama Pelanggan</th>
                    <th>Jasa</th>
                    <th>Teknisi</th>
                    <th>Status</th>
                    <th>Harga Akhir</th>
                    <th>Tanggal Pengerjaan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($orders as $order)
                    @if ($order->status == 'Selesai')
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td>{{ $order->pelanggan->nama }}</td>
                            <td>{{ $order->jasa->jasa }}</td>
                            <td>{{ $order->pengguna->nama }}</td>
                            <td class="text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight  rounded-full  {{ $order->status == 'Selesai' ? 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100' : 'text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100' }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                            <td>Rp {{ number_format($order->harga_akhir) }}</td>
                            <td data-order="{{ \Carbon\Carbon::parse($order->tgl_pengerjaan)->format('Y-m-d H:i:s') }}">
                                {{ \Carbon\Carbon::parse($order->tgl_pengerjaan)->translatedFormat('l, j F Y H:i') }}
                            </td>
                            <td>
                                <a href="{{ route('admin.order.show', $order->id) }}"
                                    class="flex items-center justify-start px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                    aria-label="Edit">
                                    <x-heroicon-s-information-circle class="w-5 h-5" />
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <h3 class="mt-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Pengeluaran
        </h3>
        <table id="pengeluaranTable" class="display dark:text-gray-400">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th>Pengguna</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                    <th>Tanggal Pembelian</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#historyTable').DataTable({
                info: false,
                paging: false,
                responsive: true,
                order: [5, 'desc'],
                columnDefs: [{
                    targets: [6],
                    orderable: false,
                }],
            });
        });
        $(document).ready(function() {
            $('#pengeluaranTable').DataTable({
                info: false,
                responsive: true,
                paging: false,
                order: [3, 'desc'],
            });
        });
    </script>
@endsection
