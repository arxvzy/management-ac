@extends('layouts.admin')
@section('title', 'Edit Pelanggan')

@section('content')
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Pelanggan
        </h2>


        <form action="{{ route('admin.pelanggan.update', $pelanggan->id) }}" method="POST"
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            @method('PUT')
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Nama" name="nama" type="text" value="{{ $pelanggan->nama }}" />
                @error('nama')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <label class="mt-4 block text-sm">
                <span class="text-gray-700 dark:text-gray-400">No. Telepon</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="62xxx" name="no_hp" type="tel" value="{{ $pelanggan->no_hp }}" />
                @error('no_hp')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <label class="mt-4 block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Alamat</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Alamat" name="alamat" type="text" value="{{ $pelanggan->alamat }}" />
                @error('password')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <label class="mt-4 block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Koordinat</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="https://maps.app.goo.gl/..." name="koordinat" type="url"
                    value="{{ $pelanggan->koordinat }}" />
                @error('koordinat')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <x-button class="mt-6 py-3" type="submit">Simpan</x-button>
        </form>
    </div>
@endsection
