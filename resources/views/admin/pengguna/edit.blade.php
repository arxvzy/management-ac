@extends('layouts.admin')
@section('title', 'Edit Pengguna')

@section('content')
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Pengguna
        </h2>

        <form action="{{ route('admin.pengguna.update', $pengguna->id) }}" method="POST"
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            @method('PUT')
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    value="{{ $pengguna->nama }}" name="nama" />
                @error('nama')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <label class="mt-4 block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Username</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    value="{{ $pengguna->username }}" name="username" />
                @error('username')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Jenis Akun
                </span>
                <div class="mt-2">
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                        <input type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="role" value="admin" {{ $pengguna->role == 'admin' ? 'checked' : '' }} />
                        <span class="ml-2">Admin</span>
                    </label>
                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                        <input type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="role" value="teknisi" {{ $pengguna->role == 'teknisi' ? 'checked' : '' }} />
                        <span class="ml-2">Teknisi</span>
                    </label>
                </div>
                @error('role')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Status Pengguna
                </span>
                <div class="mt-2">
                    <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                        <input type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="is_active" value="1" {{ $pengguna->is_active == true ? 'checked' : '' }} />
                        <span class="ml-2">Aktif</span>
                    </label>
                    <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                        <input type="radio"
                            class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                            name="is_active" value="0" {{ $pengguna->is_active == false ? 'checked' : '' }} />
                        <span class="ml-2">Tidak Aktif</span>
                    </label>
                </div>
                @error('is_active')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </div>
            <x-button class="mt-6 py-3" type="submit">Simpan</x-button>
        </form>
    </div>
@endsection
