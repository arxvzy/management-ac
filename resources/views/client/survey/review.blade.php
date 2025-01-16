@extends('layouts.auth')
@section('title', 'Review Layanan Kami')
@section('content')
    <div class="bg-white rounded-lg shadow-xl p-8 max-w-md w-full text-center">
        <h1 class="md:text-3xl text-xl font-bold text-gray-800 mb-6">Masukkan Anda Sangat Membantu!</h1>
        <form action="{{ route('survey.simpan', $order->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            <div>
                <label for="testimoni" class="block text-sm font-medium text-gray-700 mb-2">
                    Bagikan pengalamanmu menggunakan layanan kami
                </label>
                <textarea id="testimoni" name="testimoni" rows="4" maxlength="200" required
                    class="w-full p-2 border border-gray-300 rounded-md focus:ring-purple-500 focus:border-purple-500 resize-none"
                    placeholder="Masukkanmu membantu kami..."></textarea>
            </div>
            @error('testimoni')
                <span class="text-red-400">{{ $message }}</span>
            @enderror
            <button type="submit"
                class="w-full bg-purple-600 mt-4 text-white py-2 px-4 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                Submit
            </button>
        </form>
    </div>
@endsection
