@extends('layouts.admin')
@section('title', 'Kirim Survey Pelanggan')
@section('content')
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Kirim Survey Pelanggan
        </h2>

        <table id="surveyTable" class="display">
            <thead>
                <tr>
                    <th>Nama Pelanggan</th>
                    <th>No. HP</th>
                    <th>Tanggal Pengerjaan</th>
                    <th>Jasa</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->pelanggan->nama }}</td>
                        <td>{{ $order->pelanggan->no_hp }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->tgl_pengerjaan)->translatedFormat('l, j F Y H:i') }}
                        </td>
                        <td>{{ $order->jasa->jasa }}</td>
                        <td>
                            <span
                                class="px-2 py-1 font-semibold leading-tight  rounded-full text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100">
                                Belum Diingatkan
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('admin.survey.kirim', $order->id) }}" method="POST"
                                class="flex items-center justify-start px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                aria-label="Kirim">
                                @csrf
                                @method('PUT')
                                <button type="submit">
                                    <x-heroicon-o-chat-bubble-left-ellipsis class="w-5 h-5" />
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#surveyTable').DataTable({
                info: false,
                paging: false,
                responsive: true,
                ordering: false
            });
        });
    </script>
@endsection
