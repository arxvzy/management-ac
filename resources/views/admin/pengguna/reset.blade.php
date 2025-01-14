@extends('layouts.admin')
@section('title', 'Reset Password')

@section('content')
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Reset Password
        </h2>

        <form action="{{ route('auth.update', $pengguna->id) }}" method="POST"
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            @method('PUT')
            <h3 class="my-3 text-xl font-semibold text-gray-700 dark:text-gray-200">Reset Password Untuk
                {{ $pengguna->nama }}</h3>
            <label class="mt-4 block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Password Baru</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="***" name="password" type="password" />
                @error('password')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <label class="mt-4 block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Konfirmasi Password Baru</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="***" name="password_confirmation" type="password" />
                @error('password')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <x-button class="mt-6 py-3" type="submit">Simpan</x-button>
        </form>
    </div>
@endsection
