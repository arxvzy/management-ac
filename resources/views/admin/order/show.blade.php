@extends('layouts.admin')
@section('title', 'Detail Order')

@section('content')
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Detail Order
        </h2>

        <div class="flow-root">
            <dl class="-my-3 divide-y divide-gray-100 text-sm text-gray-700 dark:text-gray-200">
                <div class="grid grid-cols-1 gap-1 py-2 even:bg-gray-50 dark:even:bg-gray-800 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium ">Nama</dt>
                    <dd class=" sm:col-span-2">{{ $order->pelanggan->nama }}</dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-2 even:bg-gray-50 dark:even:bg-gray-800 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium ">Jasa</dt>
                    <dd class=" sm:col-span-2">{{ $order->jasa->jasa }}</dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-2 even:bg-gray-50 dark:even:bg-gray-800 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium ">Teknisi</dt>
                    <dd class=" sm:col-span-2">{{ $order->pengguna->nama }}</dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-2 even:bg-gray-50 dark:even:bg-gray-800 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium ">Jadwal</dt>
                    <dd class=" sm:col-span-2">
                        {{ \Carbon\Carbon::parse($order->jadwal)->translatedFormat('l, F j, Y') }}</dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-2 even:bg-gray-50 dark:even:bg-gray-800 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium ">Metode Pembayaran</dt>
                    @if (is_null($order->metode_pembayaran))
                        <dd class=" sm:col-span-2">-</dd>
                    @else
                        <dd class=" sm:col-span-2">{{ $order->metode_pembayaran }}</dd>
                    @endif
                </div>
                <div class="grid grid-cols-1 gap-1 py-2 even:bg-gray-50 dark:even:bg-gray-800 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium ">Harga Awal</dt>
                    <dd class=" sm:col-span-2">Rp {{ number_format($order->harga_awal) }}</dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-2 even:bg-gray-50 dark:even:bg-gray-800 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium ">Harga Akhir</dt>
                    @if (is_null($order->harga_akhir))
                        <dd class=" sm:col-span-2">-</dd>
                    @else
                        <dd class=" sm:col-span-2">Rp {{ number_format($order->harga_akhir) }}</dd>
                    @endif
                </div>
                <div class="grid grid-cols-1 gap-1 py-2 even:bg-gray-50 dark:even:bg-gray-800 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium ">Waktu Pengerjaan</dt>
                    <dd class=" sm:col-span-2">
                        {{ \Carbon\Carbon::parse($order->tgl_pengerjaan)->translatedFormat('l, j F Y H:i') }}</dd>
                </div>
                <div class="grid grid-cols-1 gap-1 py-2 even:bg-gray-50 dark:even:bg-gray-800 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium ">Status</dt>
                    @if (is_null($order->status))
                        <dd class=" sm:col-span-2">-</dd>
                    @else
                        <dd class=" sm:col-span-2 text-xs"><span
                                class="px-2 py-1 font-semibold leading-tight  rounded-full  {{ $order->status == 'Selesai' ? 'text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100' : 'text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100' }}">
                                {{ $order->status }}
                            </span></dd>
                    @endif
                </div>
                <div class="grid grid-cols-1 gap-1 py-2 even:bg-gray-50 dark:even:bg-gray-800 sm:grid-cols-3 sm:gap-4">
                    <dt class="font-medium ">Testimoni</dt>
                    <dd class=" sm:col-span-2">
                        {{ $order->testimoni ? $order->testimoni : 'Belum ada testimoni' }}</dd>
                </div>
            </dl>
        </div>
    </div>
@endsection
