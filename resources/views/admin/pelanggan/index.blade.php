@extends('layouts.admin')
@section('title', 'Pelanggan')
@section('content')
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

        <table id="pelangganTable" class="display">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Koordinat</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pelanggan as $user)
                    <tr>
                        <td>{{ $user->nama }}</td>
                        <td>{{ $user->no_hp }}</td>
                        <td>{{ $user->alamat }}</td>
                        <td>{{ $user->koordinat }}</td>
                        <td>
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{ route('admin.pelanggan.edit', $user->id) }}"
                                    class="flex items-center justify-start px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                    aria-label="Edit">
                                    <x-heroicon-s-pencil class="w-5 h-5" />
                                </a>
                                <form action="{{ route('admin.pelanggan.hapus', $user->id) }}" method="POST"
                                    style="display: none;" id="delete-form-{{ $user->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button
                                    onclick="event.preventDefault(); confirmDelete({{ $user->id }}, '{{ $user->nama }}', 'pelanggan');"
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
            $('#pelangganTable').DataTable({
                info: false,
                paging: false,
                responsive: true,
                columnDefs: [{
                    targets: [4, 3, 1],
                    orderable: false,
                }, ],
            });
        });
    </script>
@endsection
