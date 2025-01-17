@extends('layouts.admin')
@section('title', 'Manajemen Order')
@section('content')
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Manajemen Order
        </h2>
        @if (session()->has('success'))
            <x-alert>Order</x-alert>
        @endif
        <h4 class="mt-4 text-lg font-semibold">
            <x-button class="py-2" href="{{ route('admin.order.tambah') }}">Tambah</x-button>
        </h4>

        <table id="orderTable" class="display dark:text-gray-400">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th>Jasa</th>
                    <th>Pelanggan</th>
                    <th>Harga Awal</th>
                    <th>Teknisi</th>
                    <th>Jadwal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($orders as $order)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td>{{ $order->jasa->jasa }}</td>
                        <td>{{ $order->pelanggan->nama }}</td>
                        <td>Rp {{ number_format($order->harga_awal) }}</td>
                        <td>{{ $order->pengguna->nama }}</td>
                        <td data-order="{{ \Carbon\Carbon::parse($order->jadwal)->format('Y-m-d') }}">
                            {{ \Carbon\Carbon::parse($order->jadwal)->translatedFormat('l, F j, Y') }}
                        </td>
                        <td>
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{ route('admin.order.edit', $order->id) }}"
                                    class="flex items-center justify-start px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                    aria-label="Edit">
                                    <x-heroicon-s-pencil class="w-5 h-5" />
                                </a>
                                <form action="{{ route('admin.order.hapus', $order->id) }}" method="POST"
                                    style="display: none;" id="delete-form-{{ $order->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button
                                    onclick="event.preventDefault(); confirmDelete({{ $order->id }}, '{{ $order->pelanggan->nama }}', 'order');"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                    <x-heroicon-s-trash class="w-5 h-5" />
                                </button>
                                <a href="{{ route('admin.order.show', $order->id) }}"
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
    </div>
    <script>
        $(document).ready(function() {
            $('#orderTable').DataTable({
                info: false,
                responsive: true,
                paging: false,
                order: [],
                columnDefs: [{
                    targets: [5],
                    orderable: false,
                }, ],
            });
        });
    </script>
@endsection
