@extends('layouts.admin')
@section('title', 'Kelola Jasa')
@section('content')
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Kelola Jasa
        </h2>
        @if (session()->has('success'))
            <x-alert>Jasa</x-alert>
        @endif
        <h4 class="mt-4 text-lg font-semibold">
            <x-button class="py-2" href="{{ route('admin.jasa.tambah') }}">Tambah</x-button>
        </h4>

        <table id="jasaTable" class="display">
            <thead>
                <tr>
                    <th>Jasa</th>
                    <th>Keterangan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jasas as $jasa)
                    <tr>
                        <td>{{ $jasa->jasa }}</td>
                        <td>{{ $jasa->keterangan }}</td>
                        <td>
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{ route('admin.jasa.edit', $jasa->id) }}"
                                    class="flex items-center justify-start px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                    aria-label="Edit">
                                    <x-heroicon-s-pencil class="w-5 h-5" />
                                </a>
                                <form action="{{ route('admin.jasa.hapus', $jasa->id) }}" method="POST"
                                    style="display: none;" id="delete-form-{{ $jasa->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button
                                    onclick="event.preventDefault(); confirmDelete({{ $jasa->id }}, '{{ $jasa->jasa }}', 'jasa');"
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
            $('#jasaTable').DataTable({
                info: false,
                paging: false,
                responsive: true,
                columnDefs: [{
                    targets: [1, 2],
                    orderable: false,
                }, ],
            });
        });
    </script>
@endsection