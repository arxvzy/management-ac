@extends('layouts.admin')
@section('title', 'Tambah Order')

@section('content')
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tambah Order
        </h2>


        <form action="{{ route('admin.order.simpan') }}" method="POST"
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Jenis Jasa
                </span>
                <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="id_jasa">
                    <option disabled selected>Pilih Jasa</option>
                    @foreach ($jasas as $jasa)
                        <option value="{{ $jasa->id }}" {{ old('id_jasa') == $jasa->id ? 'selected' : '' }}>
                            {{ $jasa->jasa }}</option>
                    @endforeach
                </select>
                @error('id_jasa')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Nama Pelanggan
                </span>
                <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="id_pelanggan">
                    <option disabled selected>Pilih Pelanggan</option>
                    @foreach ($pelanggans as $pelanggan)
                        <option value="{{ $pelanggan->id }}" {{ old('id_pelanggan') == $pelanggan->id ? 'selected' : '' }}>
                            {{ $pelanggan->nama }}</option>
                    @endforeach
                </select>
                @error('id_pelanggan')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <label class="mt-4 block text-sm text-gray-700 dark:text-gray-400">Harga Awal (IDR)</label>
            <div class="flex items-center mt-1">
                <span
                    class="px-2 py-2 bg-gray-100 border border-gray-300 rounded-l dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">Rp</span>
                <input type="number" id="harga_awal" name="harga_awal" placeholder="Harga Awal"
                    value="{{ old('harga_awal') }}"
                    class="w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-r">
            </div>
            @error('harga_awal')
                <span class="text-red-400">{{ $message }}</span>
            @enderror
            <label class="mt-4 block text-sm text-gray-700 dark:text-gray-400">Harga Akhir (IDR)</label>
            <div class="flex items-center mt-1">
                <span
                    class="px-2 py-2 bg-gray-100 border border-gray-300 rounded-l dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">Rp</span>
                <input type="number" id="harga_akhir" name="harga_akhir" placeholder="Harga Akhir"
                    value="{{ old('harga_akhir') }}"
                    class="w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-r">
            </div>
            @error('harga_akhir')
                <span class="text-red-400">{{ $message }}</span>
            @enderror
            <label class="mt-4 block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Jadwal</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Jadwal" name="jadwal" type="date" value="{{ old('jadwal') }}" />
                @error('jadwal')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Metode Pembayaran
                </span>
                <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="metode_pembayaran">
                    <option disabled selected>Pilih Metode Pembayaran</option>
                    <option value="COD" {{ old('metode_pembayaran') == 'COD' ? 'selected' : '' }}>COD</option>
                    <option value="Transfer" {{ old('metode_pembayaran') == 'Transfer' ? 'selected' : '' }}>Transfer
                    </option>
                </select>
                @error('metode_pembayaran')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Nama Teknisi
                </span>
                <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="id_pengguna">
                    <option disabled selected>Pilih Teknisi</option>
                    @foreach ($penggunas as $pengguna)
                        <option value="{{ $pengguna->id }}" {{ old('id_pengguna') == $pengguna->id ? 'selected' : '' }}>
                            {{ $pengguna->nama }}</option>
                    @endforeach
                </select>
                @error('id_pengguna')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <x-button class="mt-6 py-3" type="submit">Simpan</x-button>
        </form>
    </div>
@endsection
