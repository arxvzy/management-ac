@extends('layouts.admin')
@section('title', 'Kritik & Saran Pelanggan')
@section('content')
    @php
        $kritikSaranRow = ($kritiksarans->currentPage() - 1) * $kritiksarans->perPage() + 1;
    @endphp
    <div>
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Kritik & Saran Pelanggan
        </h2>

        <table id="kritikSaranTable" class="display dark:text-gray-400">
            <thead>
                <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th>No.</th>
                    <th>Nama Pelanggan</th>
                    <th>Kritik & Saran</th>
                    <th>No. HP</th>
                    <th>Tanggal Pengerjaan</th>
                    <th>Jasa</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($kritiksarans as $kritiksaran)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td>{{ $kritikSaranRow++ }}</td>
                        <td>{{ $kritiksaran->pelanggan->nama ?? '-' }}</td>
                        <td>{{ $kritiksaran->kritik_saran ?? '-' }}</td>
                        <td>{{ $kritiksaran->pelanggan->no_hp ?? '-' }}</td>
                        <td>
                            {{ \Carbon\Carbon::parse($kritiksaran->order->tgl_pengerjaan)->translatedFormat('l, j F Y H:i') }}
                        </td>
                        <td>{{ $kritiksaran->order->jasa->jasa ?? '-' }}</td>


                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $kritiksarans->links() }}
        <div class="mt-10"></div>

    </div>
    <script>
        $(document).ready(function() {
            var survey = $('#kritikSaranTable').DataTable({
                info: false,
                paging: false,
                responsive: true,
                searching: false,
                ordering: false
            });

            survey.columns.adjust().responsive.recalc();
        });
    </script>
@endsection
