@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')
    @php
        if (request()->has('from') && request()->has('to')) {
            $orderRow = 1;
            $pengeluaranRow = 1;
        } else {
            $orderRow = ($orders->currentPage() - 1) * $orders->perPage() + 1;
            $pengeluaranRow = ($pengeluarans->currentPage() - 1) * $pengeluarans->perPage() + 1;
        }
    @endphp
    <div>
        <div class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200 md:flex md:justify-between">
            <h2>Dashboard</h2>
            <form action="{{ route('admin.home') }}" method="GET"
                class="flex flex-col md:flex-row gap-4 text-xs mt-4 md:mt-0 w-1/3 md:w-auto">
                <div class="flex flex-row md:items-center gap-2 ">
                    <label for="from" class="cursor-pointer flex justify-center gap-2">
                        <p class="my-auto">Dari</p>
                        <input type="date" id="from" name="from"
                            class=" bg-white text-black dark:bg-gray-800 dark:text-white border dark:border-gray-700 rounded"
                            value="{{ old('from', request('from')) }}" />
                    </label>


                    <!-- To Date -->
                    <label for="to" class="cursor-pointer flex justify-center gap-2">
                        <p class="my-auto">Sampai</p>
                        <input type="date" id="to" name="to"
                            class=" bg-white text-black dark:bg-gray-800 dark:text-white border dark:border-gray-700 rounded"
                            value="{{ old('to', request('to')) }}" />
                    </label>
                </div>
                <x-button type="submit" class="max-w-20">Cari</x-button>
            </form>
        </div>


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
                <div class="p-3 mr-4 rounded-full text-red-500 bg-red-100 dark:text-red-100 dark:bg-red-500">
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
                        Rp {{ number_format($totalPengeluaran) }}
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
                        {{ count($statusOrder) }}
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
                        {{ $statusOrder->filter(fn($status) => $status === 'Selesai')->count() }}
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
                        {{ $statusOrder->filter(fn($status) => $status === 'Batal')->count() }}
                    </p>
                </div>
            </div>
            <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                        </path>
                    </svg>
                </div>
                <div>
                    <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                        Pending Order
                    </p>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                        {{ $statusOrder->filter(fn($status) => is_null($status))->count() }}
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
                    <th>No.</th>
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
                            <td>{{ $orderRow++ }}</td>
                            <td>{{ $order->pelanggan->nama ?? '-' }}</td>
                            <td>{{ $order->jasa->jasa ?? '-' }}</td>
                            <td>{{ $order->pengguna->nama ?? '-' }}</td>
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
        @if (!request()->has('from') && !request()->has('to'))
            {{ $orders->links() }}
        @endif

        <h3 class="mt-6 text-xl font-semibold text-gray-700 dark:text-gray-200">
            Pengeluaran
        </h3>
        <table id="pengeluaranTable" class="display dark:text-gray-400">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th>No.</th>
                    <th>Pengguna</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                    <th>Tanggal Pembelian</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($pengeluarans as $pengeluaran)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td>{{ $pengeluaranRow++ }}</td>
                        <td>{{ $pengeluaran->pengguna->nama ?? '-' }}</td>
                        <td>{{ $pengeluaran->keterangan }}</td>
                        <td>Rp {{ number_format($pengeluaran->nominal) }}</td>
                        <td data-order="{{ \Carbon\Carbon::parse($pengeluaran->tgl_pembelian)->format('Y-m-d H:i:s') }}">
                            {{ \Carbon\Carbon::parse($pengeluaran->tgl_pembelian)->translatedFormat('l, j F Y H:i') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if (!request()->has('from') && !request()->has('to'))
            {{ $pengeluarans->links() }}
        @endif
        <div class="mt-10"></div>
    </div>
    <script>
        $(document).ready(function() {
            var history = $('#historyTable').DataTable({
                info: false,
                responsive: true,
                order: [],
                searching: false,
                paging: false,
                columnDefs: [{
                    targets: [6],
                    orderable: false,
                }],
            });
            history.columns.adjust().responsive.recalc();
        });
        $(document).ready(function() {
            var pengeluaran = $('#pengeluaranTable').DataTable({
                info: false,
                responsive: true,
                searching: false,
                paging: false,
                order: [],
            });
            pengeluaran.columns.adjust().responsive.recalc();

        });

        document.addEventListener('DOMContentLoaded', () => {
            const fromDate = document.getElementById('from');
            fromDate.addEventListener('click', () => {
                fromDate.showPicker();
            });
            const toDate = document.getElementById('to');
            toDate.addEventListener('click', () => {
                toDate.showPicker();
            });
        });

        document.querySelector('form').addEventListener('submit', function(event) {
            let toDate = document.getElementById('to');
            let fromDate = document.getElementById('from');

            if (!toDate.value) {
                toDate.disabled = true;
            }
            if (!fromDate.value) {
                fromDate.disabled = true;
            }
        });
    </script>
@endsection
