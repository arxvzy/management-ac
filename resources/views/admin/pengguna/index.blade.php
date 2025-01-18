@extends('layouts.admin')
@section('title', 'Pengguna')
@section('content')
    @php
        $penggunaRow = ($penggunas->currentPage() - 1) * $penggunas->perPage() + 1;
    @endphp
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Pengguna
        </h2>

        @if (session()->has('success'))
            <x-alert>Pengguna</x-alert>
        @endif

        <h4 class="my-4 text-lg font-semibold">
            <x-button class="py-2" href="{{ route('admin.pengguna.tambah') }}">Tambah</x-button>
        </h4>

        <table id="penggunaTable" class="display dark:text-gray-400">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Status</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($penggunas as $pengguna)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td>{{ $penggunaRow++ }}</td>
                        <td>{{ $pengguna->nama }}</td>
                        <td>{{ $pengguna->username }}</td>
                        <td class="text-xs">
                            @if ($pengguna->is_active)
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Active
                                </span>
                            @else
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                    Inactive
                                </span>
                            @endif
                        </td>
                        <td>
                            {{ $pengguna->role }}
                        </td>
                        <td>
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{ route('admin.pengguna.edit', $pengguna->id) }}"
                                    class="flex items-center justify-start px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                    aria-label="Edit">
                                    <x-heroicon-s-pencil class="w-5 h-5" />
                                </a>
                                <form action="{{ route('admin.pengguna.hapus', $pengguna->id) }}" method="POST"
                                    style="display: none;" id="delete-form-{{ $pengguna->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                                <button
                                    onclick="event.preventDefault(); confirmDelete({{ $pengguna->id }}, '{{ $pengguna->nama }}', 'pengguna');"
                                    class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                    <x-heroicon-s-trash class="w-5 h-5" />
                                </button>
                                <a href="{{ route('auth.reset', $pengguna->id) }}"
                                    class="flex items-center justify-start px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                    aria-label="Reset Password">
                                    <x-heroicon-s-key class="w-5 h-5" />
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $penggunas->links() }}
        <div class="mt-10"></div>

    </div>
    <script>
        $(document).ready(function() {
            var pengguna = $('#penggunaTable').DataTable({
                info: false,
                paging: false,
                responsive: true,
                searching: false,
                ordering: false
            });
            pengguna.columns.adjust().responsive.recalc();
        });
    </script>
@endsection
