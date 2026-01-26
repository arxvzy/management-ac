@extends('layouts.admin')
@section('title', 'Edit Order')

@section('content')
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Order
        </h2>


        <form action="{{ route('admin.order.update', $order->id) }}" method="POST"
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            @method('PUT')
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Jenis Jasa
                </span>
                <select
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="id_jasa">
                    <option disabled selected>Pilih Jasa</option>
                    @foreach ($jasas as $jasa)
                        <option value="{{ $jasa->id }}" {{ $order->id_jasa == $jasa->id ? 'selected' : '' }}>
                            {{ $jasa->jasa }}</option>
                    @endforeach
                </select>
                @error('id_jasa')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <label class="block mt-4 text-sm" x-data="searchableSelect(
                {{ $pelanggans->toJson() }},
                {{ $order->pelanggan->toJson() }}
            )">
                <span class="text-gray-700 dark:text-gray-400">
                    Nama Pelanggan
                </span>

                <div class="relative mt-1">
                    <input type="text" x-model="search" @focus="open = true" @blur="closeLater()"
                        placeholder="Cari pelanggan"
                        class="block w-full text-sm form-input
                           text-gray-900 bg-white border-gray-300
                           dark:text-gray-200 dark:bg-gray-700 dark:border-gray-600
                           focus:border-purple-400 focus:outline-none">

                    <div x-show="open" x-transition
                        class="absolute z-20 w-full mt-1 max-h-48 overflow-y-auto
                           bg-white border border-gray-300 rounded-md shadow-lg
                           dark:bg-gray-800 dark:border-gray-600">
                        <template x-if="filtered.length === 0">
                            <div class="px-3 py-2 text-sm text-gray-500 dark:text-gray-400">
                                Pelanggan tidak ditemukan
                            </div>
                        </template>

                        <template x-for="pelanggan in filtered" :key="pelanggan.id">
                            <div @mousedown.prevent="choose(pelanggan)"
                                class="px-3 py-2 text-sm cursor-pointer
                                   text-gray-700 hover:bg-purple-100
                                   dark:text-gray-200 dark:hover:bg-gray-600"
                                x-text="pelanggan.nama"></div>
                        </template>
                    </div>
                </div>

                <select name="id_pelanggan" class="hidden">
                    <option :value="selected?.id" selected></option>
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
                    value="{{ $order->harga_awal }}"
                    class="w-full py-2 px-2 border-2 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input rounded-r">
            </div>
            @error('harga_awal')
                <span class="text-red-400">{{ $message }}</span>
            @enderror
            <label class="mt-4 block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Jadwal</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Jadwal" name="jadwal" id="jadwal" type="date" value="{{ $order->jadwal }}" />
                @error('jadwal')
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
                        <option value="{{ $pengguna->id }}" {{ $order->id_pengguna == $pengguna->id ? 'selected' : '' }}>
                            {{ $pengguna->nama }}</option>
                    @endforeach
                </select>
                @error('id_pengguna')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Keterangan</span>
                <textarea
                    class="block border-2 w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    rows="3" placeholder="Masukkan keterangan" name="deskripsi">{{ $order->deskripsi }}</textarea>
                @error('deskripsi')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <x-button class="mt-6 py-3" type="submit">Simpan</x-button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dateInput = document.getElementById('jadwal');
            dateInput.addEventListener('click', () => {
                dateInput.showPicker();
            });
        });
    </script>
@endsection
