@extends('layouts.admin')
@section('title', 'Pengeluaran')
@section('content')
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

        <table id="pengeluaranTable" class="display">
            <thead>
                <tr>
                    <th>Tanggal Pembelian</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                    <th>Pengguna</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pengeluarans as $pengeluaran)
                    <tr>
                        <td>{{ $pengeluaran->tgl_pembelian }}</td>
                        <td>{{ $pengeluaran->keterangan }}</td>
                        <td>Rp {{ $pengeluaran->nominal }}</td>
                        <td>{{ $pengeluaran->pengguna->nama }}</td>
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
    </div>
    <script>
        $(document).ready(function() {
            $('#pengeluaranTable').DataTable({
                info: false,
                responsive: true,
                paging: false,
                columnDefs: [{
                    targets: [1, 4],
                    orderable: false,
                }, ],
            });
        });
    </script>
@endsection
