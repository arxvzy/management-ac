@extends('layouts.admin')
@section('title', 'Edit Penugasan')

@section('content')
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Penugasan
        </h2>
        <form action="{{ route('admin.penugasan.update', $order->id) }}" method="POST"
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            @method('PUT')
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Nama Pelanggan</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    value="{{ $order->pelanggan->nama }}" disabled name="nama" />
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Alamat</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    value="{{ $order->pelanggan->alamat }}" disabled name="alamat" />
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Koordinat</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    value="{{ $order->pelanggan->koordinat }}" disabled name="koordinat" />
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Jasa</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    value="{{ $order->jasa->jasa }}" disabled name="jasa" />
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Deskripsi Pengerjaan</span>
                <textarea
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3" placeholder="Masukkan Deskripsi Pengerjaan" value="{{ $order->deskripsi }}" name="deskripsi"></textarea>
            </label>
            <label class="mt-4 block text-sm text-gray-700 dark:text-gray-400">Harga Akhir (IDR)</label>
            <div class="flex items-center mt-1">
                <span
                    class="px-2 py-2 bg-gray-100 border border-gray-300 rounded-l dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300">Rp</span>
                <input type="number" id="harga_akhir" name="harga_akhir" placeholder="Masukkan Harga Akhir"
                    value="{{ $order->harga_akhir }}"
                    class="w-full text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-r">
            </div>
            @error('harga_akhir')
                <span class="text-red-400">{{ $message }}</span>
            @enderror
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Metode Pembayaran
                </span>
                <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="metode_pembayaran">
                    <option disabled selected>Pilih Metode Pembayaran</option>
                    <option value="Tunai" {{ $order->metode_pembayaran == 'Tunai' ? 'selected' : '' }}>Tunai</option>
                    <option value="Transfer" {{ $order->metode_pembayaran == 'Transfer' ? 'selected' : '' }}>Transfer Bank
                    </option>
                </select>
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Status
                </span>
                <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="status">
                    <option disabled selected>Pilih Status</option>
                    <option value="Selesai" {{ $order->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="Batal" {{ $order->status == 'Batal' ? 'selected' : '' }}>Batal</option>
                </select>
            </label>
            <x-button class="mt-6 py-3" type="submit">Simpan</x-button>
        </form>
    </div>
@endsection
