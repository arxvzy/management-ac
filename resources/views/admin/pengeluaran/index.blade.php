@extends('layouts.admin')
@section('title', 'Pengeluaran')
@section('content')
    @php
        $pengeluaranRow = ($pengeluarans->currentPage() - 1) * $pengeluarans->perPage() + 1;
    @endphp
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
                    <th>No.</th>
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
                        <td>{{ $pengeluaranRow++ }}</td>
                        <td>{{ $pengeluaran->pengguna->nama }}</td>
                        <td>{{ $pengeluaran->keterangan }}</td>
                        <td>Rp {{ number_format($pengeluaran->nominal) }}</td>
                        <td data-order="{{ \Carbon\Carbon::parse($pengeluaran->tgl_pembelian)->format('Y-m-d H:i:s') }}">
                            {{ \Carbon\Carbon::parse($pengeluaran->tgl_pembelian)->translatedFormat('l, j F Y H:i') }}
                        </td>
                        <td>
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{ route('admin.pengeluaran.edit', $pengeluaran->id) }}"
                                    class="flex items-center justify-start px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                    aria-label="Edit">
                                    <x-heroicon-s-pencil class="w-5 h-5" />
                                </a>
                                <form action="{{ route('admin.pengeluaran.hapus', $pengeluaran->id) }}" method="POST"
                                    style="display: none;" id="delete-form-{{ $pengeluaran->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button
                                    onclick="event.preventDefault(); confirmDelete({{ $pengeluaran->id }}, '{{ $pengeluaran->keterangan }}', 'pengeluaran');"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                    <x-heroicon-s-trash class="w-5 h-5" />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $pengeluarans->links() }}
        <div class="mt-10"></div>

    </div>
    <script>
        $(document).ready(function() {
            $('#pengeluaranTable').DataTable({
                info: false,
                responsive: true,
                paging: false,
                searching: false,
                order: [],
                columnDefs: [{
                    targets: [5],
                    orderable: false,
                }, ],
            });
        });
    </script>
@endsection
