@extends('layouts.admin')
@section('title', 'Pengingat Service')
@section('content')
    @php
        $pelangganRow = ($pelanggans->currentPage() - 1) * $pelanggans->perPage() + 1;
    @endphp
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Pengingat Service
        </h2>

        <table id="pengingatTable" class="display dark:text-gray-400">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th>No.</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Terakhir Service</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($pelanggans as $pelanggan)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td>{{ $pelangganRow++ }}</td>
                        <td>{{ $pelanggan->nama }}</td>
                        <td>{{ $pelanggan->alamat }}</td>
                        <td>{{ $pelanggan->no_hp }}</td>
                        <td>{{ \Carbon\Carbon::parse($pelanggan->latest_order_date)->translatedFormat('l, j F Y H:i') }}
                        </td>
                        <td>
                            <form action="{{ route('admin.pengingat.kirim', $pelanggan->id) }}" method="POST"
                                class="flex items-center justify-start px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                aria-label="Edit">
                                @csrf
                                @method('PUT')
                                <button type="submit">
                                    <x-bi-whatsapp class="w-5 h-5" />
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $pelanggans->links() }}
        <div class="mt-10"></div>

    </div>
    <script>
        $(document).ready(function() {
            var pengingat = $('#pengingatTable').DataTable({
                info: false,
                paging: false,
                responsive: true,
                searching: false,
                ordering: false
            });
            pengingat.columns.adjust().responsive.recalc();
        });
    </script>
@endsection
