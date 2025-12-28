@extends('layouts.admin')
@section('title', 'History Order')
@section('content')
    @php
        $orderRow = ($orders->currentPage() - 1) * $orders->perPage() + 1;
    @endphp
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            History Order
        </h2>
        <h4 class="mt-4 text-lg font-semibold flex justify-end">
            <form method="GET" class="mb-4 flex items-center gap-2"
                onsubmit="if(!this.search.value.trim()) this.search.disabled = true;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Riwayat Order ..."
                    class="w-28 md:w-64 px-3 py-2 text-sm border rounded-lg border-gray-300 dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600">
                <button class="px-4 py-2 text-sm bg-purple-600 text-white rounded-lg">
                    Cari
                </button>
            </form>
        </h4>
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
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
        <div class="mt-10"></div>
    </div>
    <script>
        $(document).ready(function() {
            var history = $('#historyTable').DataTable({
                info: false,
                paging: false,
                responsive: true,
                searching: false,
                order: [],
                columnDefs: [{
                    targets: [
                        7
                    ],
                    orderable: false,
                }],
            });

            history.columns.adjust().responsive.recalc();
        });
    </script>
@endsection
