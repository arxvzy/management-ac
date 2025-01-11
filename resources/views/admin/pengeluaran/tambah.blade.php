@extends('layouts.admin')
@section('title', 'Tambah Pengeluaran')

@section('content')
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tambah Pengeluaran
        </h2>


        <form action="{{ route('admin.pengeluaran.simpan') }}" method="POST"
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Keterangan</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Keterangan" name="keterangan" type="text" value="{{ old('keterangan') }}" />
                @error('keterangan')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <label for="nominal" class="mt-4 block text-sm text-gray-700 dark:text-gray-400">Nominal (IDR):</label>
            <div class="flex items-center mt-1">
                <span
                    class="px-2 py-2 bg-gray-100 border border-gray-300 rounded-l dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">Rp</span>
                <input type="number" id="nominal" name="nominal" placeholder="Masukkan Nominal"
                    value="{{ old('nominal') }}"
                    class="w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-r">
            </div>
            <label class="mt-4 block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Tanggal Pembelian</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Tanggal Pembelian" name="tgl_pembelian" type="datetime-local"
                    value="{{ old('tgl_pembelian') }}" />
                @error('tgl_pembelian')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <x-button class="mt-6 py-3" type="submit">Simpan</x-button>
    </div>
    </form>
    </div>
@endsection
