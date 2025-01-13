@extends('layouts.admin')
@section('title', 'Edit Jasa')

@section('content')
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Edit Jasa
        </h2>


        <form action="{{ route('admin.jasa.update', $jasa->id) }}" method="POST"
            class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            @csrf
            @method('PUT')
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Jasa</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="masukkan jasa" name="jasa" type="text" value="{{ $jasa->jasa }}" />
                @error('jasa')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Keterangan</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="keterangan" name="keterangan" type="text" value="{{ $jasa->keterangan }}" />
                @error('keterangan')
                    <span class="text-red-400">{{ $message }}</span>
                @enderror
            </label>

            <x-button class="mt-6 py-3" type="submit">Simpan</x-button>
        </form>
    </div>
@endsection
