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

        <table id="orderTable" class="display">
            <thead>
                <tr>
                    <th>Jasa</th>
                    <th>Pelanggan</th>
                    <th>Harga Awal</th>
                    <th>Teknisi</th>
                    <th>Jadwal</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->jasa->jasa }}</td>
                        <td>{{ $order->pelanggan->nama }}</td>
                        <td>{{ $order->harga_awal }}</td>
                        <td>{{ $order->pengguna->nama }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->jadwal)->translatedFormat('l, F j, Y') }}</td>
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
                paging: false,
                responsive: true,
                order: [],
                columnDefs: [{
                    targets: [5],
                    orderable: false,
                }, ],
            });
        });
    </script>
@endsection
