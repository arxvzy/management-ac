@extends('layouts.admin')
@section('title', 'Penugasan')
@section('content')
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Penugasan
        </h2>
        <table id="penugasanTable" class="display dark:text-gray-400">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Jasa</th>
                    <th>Teknisi</th>
                    <th>Status</th>
                    <th>Jadwal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($orders as $order)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td>{{ $order->pelanggan->nama }}</td>
                        <td>{{ $order->pelanggan->koordinat }}</td>
                        <td>{{ $order->pelanggan->no_hp }}</td>
                        <td>{{ $order->jasa->jasa }}</td>
                        <td>{{ $order->pengguna->nama }}</td>
                        @if ($order->status == 'Selesai' || $order->status == 'Batal')
                            <td class="text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight  rounded-full  {{ $order->status == 'Selesai' ? 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100' : 'text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100' }}">
                                    {{ $order->status }}
                                </span>
                            </td>
                        @else
                            <td></td>
                        @endif
                        <td data-order="{{ \Carbon\Carbon::parse($order->jadwal)->format('Y-m-d') }}">
                            {{ \Carbon\Carbon::parse($order->jadwal)->translatedFormat('l, F j, Y') }}
                        </td>
                        <td>
                            <a href="{{ route('admin.penugasan.edit', $order->id) }}"
                                class="flex items-center justify-start px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                aria-label="Edit">
                                <x-heroicon-s-pencil class="w-5 h-5" />
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#penugasanTable').DataTable({
                info: false,
                paging: false,
                responsive: true,
                order: [6, 'desc'],
                columnDefs: [{
                    targets: [1, 3, 7],
                    orderable: false,
                }],
            });
        });
    </script>
@endsection
