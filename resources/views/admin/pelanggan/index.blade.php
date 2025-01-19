@extends('layouts.admin')
@section('title', 'Pelanggan')
@section('content')
    @php
        $pelangganRow = ($pelanggans->currentPage() - 1) * $pelanggans->perPage() + 1;
    @endphp
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Pelanggan
        </h2>
        @if (session()->has('success'))
            <x-alert>Pelanggan</x-alert>
        @endif
        <h4 class="mt-4 text-lg font-semibold">
            <x-button class="py-2" href="{{ route('admin.pelanggan.tambah') }}">Tambah</x-button>
        </h4>

        <table id="pelangganTable" class="display dark:text-gray-400">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Koordinat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($pelanggans as $pelanggan)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td>{{ $pelangganRow++ }}</td>
                        <td>{{ $pelanggan->nama }}</td>
                        <td>{{ $pelanggan->no_hp }}</td>
                        <td>{{ $pelanggan->alamat }}</td>
                        <td><a href="{{ $pelanggan->koordinat }}" class="underline"
                                target="_blank">{{ $pelanggan->koordinat }}</a></td>
                        <td>
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{ route('admin.pelanggan.edit', $pelanggan->id) }}"
                                    class="flex items-center justify-start px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                    aria-label="Edit">
                                    <x-heroicon-s-pencil class="w-5 h-5" />
                                </a>
                                <form action="{{ route('admin.pelanggan.hapus', $pelanggan->id) }}" method="POST"
                                    style="display: none;" id="delete-form-{{ $pelanggan->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button
                                    onclick="event.preventDefault(); confirmDelete({{ $pelanggan->id }}, '{{ $pelanggan->nama }}', 'pelanggan');"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                    <x-heroicon-s-trash class="w-5 h-5" />
                                </button>
                            </div>
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
            var pelanggan = $('#pelangganTable').DataTable({
                info: false,
                paging: false,
                responsive: true,
                searching: false,
                order: [],
                columnDefs: [{
                    targets: [5, 4, 2],
                    orderable: false,
                }, ],
            });
            pelanggan.columns.adjust().responsive.recalc();
        });
    </script>
@endsection
