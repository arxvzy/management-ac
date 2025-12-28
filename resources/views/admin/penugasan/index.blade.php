@extends('layouts.admin')
@section('title', 'Penugasan')
@section('content')
    @php
        $orderRow = ($orders->currentPage() - 1) * $orders->perPage() + 1;
    @endphp
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Penugasan
        </h2>
        <table id="penugasanTable" class="display dark:text-gray-400">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th>No.</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Status</th>
                    <th>Koordinat</th>
                    <th>Jasa</th>
                    <th>Teknisi</th>
                    <th>Jadwal</th>
                    <th>Keterangan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($orders as $order)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td>{{ $orderRow++ }}</td>
                        <td>{{ $order->pelanggan->nama ?? '-' }}</td>
                        <td>{{ $order->pelanggan->alamat ?? '-' }}</td>
                        <td>{{ $order->pelanggan->no_hp ?? '-' }}</td>
                        <td class="text-xs">
                            <div
                                class="text-xs px-2 py-1 font-semibold leading-tight  rounded-full  text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100 text-center">
                                Belum Dikerjakan
                            </div>
                        </td>
                        <td><a href="{{ $order->pelanggan->koordinat ?? '#' }}" class="underline"
                                target="_blank">{{ $order->pelanggan->koordinat ?? '-' }}</a></td>
                        <td>{{ $order->jasa->jasa ?? '-' }}</td>
                        <td>{{ $order->pengguna->nama ?? '-' }}</td>
                        <td data-order="{{ \Carbon\Carbon::parse($order->jadwal)->format('Y-m-d') }}">
                            {{ \Carbon\Carbon::parse($order->jadwal)->translatedFormat('l, F j, Y') }}
                        </td>
                        <td>{{ $order->deskripsi ?? '-' }}</td>
                        <td>
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{ route('admin.penugasan.edit', $order->id) }}"
                                    class="flex items-center justify-start px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                    aria-label="Edit">
                                    <x-heroicon-m-check class="w-5 h-5" />
                                </a>
                                <a href="{{ route('admin.penugasan.show', $order->id) }}"
                                    class="flex items-center justify-start px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                    aria-label="Edit">
                                    <x-heroicon-s-information-circle class="w-5 h-5" />
                                </a>
                            </div>
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
            var penugasan = $('#penugasanTable').DataTable({
                info: false,
                paging: false,
                responsive: true,
                searching: false,
                order: [],
                columnDefs: [{
                    targets: [1, 3, 7],
                    orderable: false,
                }],
            });
            penugasan.columns.adjust().responsive.recalc();
        });
    </script>
@endsection
