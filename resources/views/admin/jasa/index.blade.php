@extends('layouts.admin')
@section('title', 'Kelola Jasa')
@section('content')
    @php
        $jasaRow = ($jasas->currentPage() - 1) * $jasas->perPage() + 1;
    @endphp
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

        <table id="jasaTable" class="display dark:text-gray-400">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th>No.</th>
                    <th>Jasa</th>
                    <th>Keterangan</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($jasas as $jasa)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td>{{ $jasaRow++ }}</td>
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
        {{ $jasas->links() }}
        <div class="mt-10"></div>

    </div>
    <script>
        $(document).ready(function() {
            var jasa = $('#jasaTable').DataTable({
                info: false,
                paging: false,
                order: [],
                responsive: true,
                searching: false,
                columnDefs: [{
                    targets: [2, 3],
                    orderable: false,
                }, ],
            });
            jasa.columns.adjust().responsive.recalc();
        });
    </script>
@endsection
