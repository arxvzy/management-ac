@extends('layouts.admin')
@section('title', 'Pengingat Service')
@section('content')
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Pengingat Service
        </h2>

        <table id="pengingatTable" class="display dark:text-gray-400">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>No. HP</th>
                    <th>Terakhir Service</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($pelanggans as $pelanggan)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td>{{ $pelanggan->nama }}</td>
                        <td>{{ $pelanggan->koordinat }}</td>
                        <td>{{ $pelanggan->no_hp }}</td>
                        <td>{{ \Carbon\Carbon::parse($pelanggan->latest_order_date)->translatedFormat('l, j F Y H:i') }}
                        </td>
                        @if (!$pelanggan->is_reminded)
                            <td class="text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight  rounded-full text-red-700 bg-red-100 dark:bg-red-700 dark:text-red-100">
                                    Belum Diingatkan
                                </span>
                            </td>
                        @elseif ($pelanggan->is_reminded)
                            <td>
                                <span
                                    class="px-2 py-1 font-semibold leading-tight  rounded-full  text-green-700 bg-green-100 dark:bg-green-700 dark:text-green-100">
                                    Sudah Diingatkan
                                </span>
                            </td>
                        @else
                            <td></td>
                        @endif
                        <td>
                            <form action="{{ route('admin.pengingat.kirim', $pelanggan->id) }}" method="POST"
                                class="flex items-center justify-start px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray "
                                aria-label="Edit">
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
            $('#pengingatTable').DataTable({
                info: false,
                paging: false,
                responsive: true,
                ordering: false
            });
        });
    </script>
@endsection
