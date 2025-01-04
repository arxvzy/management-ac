@extends('layouts.admin')
@section('title', 'Pengguna')
@section('content')
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Pengguna
        </h2>

        @if (session()->has('success'))
            <x-alert-user />
        @endif

        <h4 class="my-4 text-lg font-semibold">
            <x-button class="py-2" href="{{ route('admin.pengguna.tambah') }}">Tambah</x-button>
        </h4>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-2 py-3">No</th>
                            <th class="px-3 py-3">Nama</th>
                            <th class="px-3 py-3">Username</th>
                            <th class="px-3 py-3">Status</th>
                            <th class="px-3 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($pengguna as $user)
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-2 py-3">
                                    {{ $loop->iteration }}
                                </td>
                                <td class="px-3 py-3 text-sm">
                                    {{ $user->nama }}
                                </td>
                                <td class="px-3 py-3 text-sm">
                                    {{ $user->username }}
                                </td>
                                <td class="px-3 py-3 text-xs">
                                    @if ($user->is_active)
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
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <x-heroicon-s-pencil class="w-5 h-5" />
                                        </button>
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <x-heroicon-s-trash class="w-5 h-5" />
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
