<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class PengingatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggans = DB::table('pelanggan')
            ->join('order', 'pelanggan.id', '=', 'order.id_pelanggan')
            ->select(
                'pelanggan.*',
                DB::raw('MAX(order.tgl_pengerjaan) as latest_order_date')
            )
            ->where('pelanggan.is_reminded', false)
            ->groupBy(
                'pelanggan.id',
                'pelanggan.nama',
                'pelanggan.no_hp',
                'pelanggan.alamat',
                'pelanggan.koordinat',
                'pelanggan.is_reminded',
                'pelanggan.created_at',
                'pelanggan.updated_at'
            )
            ->havingRaw('latest_order_date <= ?', [Carbon::now()->subMonths(3)])
            ->orderByDesc('latest_order_date')
            ->paginate(10);


        return view('admin.pengingat.index', compact('pelanggans'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $pelanggan->is_reminded = true;
        $pelanggan->save();

        $message = "Halo, {$pelanggan->nama}\n\n" .
            "Kami ingin menginformasikan bahwa saat ini sudah waktunya servis/cuci AC demi menjaga kualitas udara tetap bersih dan sehat.";

            $encodedMessage = urlencode($message);

        $whatsAppUrl = "https://wa.me/{$pelanggan->no_hp}?text={$encodedMessage}";
        return view('admin.survey.redirect', ['url' => $whatsAppUrl]);
    }
}
