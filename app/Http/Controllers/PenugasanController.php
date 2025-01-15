<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class PenugasanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role == 'teknisi') {
            $orders = Order::where('id_pengguna', $user->id)
                ->whereNull('status')->get();
        } else {
            $orders = Order::whereNull('status')->get();
        }
        return view('admin.penugasan.index', compact('orders'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.penugasan.edit', compact('order'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        if ($request->has('deskripsi')) {
            $order['deskripsi'] = $request->deskripsi;
        }
        if ($request->has('harga_akhir')) {
            $order['harga_akhir'] = $request->harga_akhir;
        }
        if ($request->has('metode_pembayaran')) {
            $order['metode_pembayaran'] = $request->metode_pembayaran;
        }
        if ($request->has('status')) {
            $order['status'] = $request->status;
            if ($request->status == 'Selesai') {
                $order->pelanggan->update(['is_reminded' => false]);
            }
            $order['tgl_pengerjaan'] = now();
        }
        $order->save();
        return redirect()->route('admin.penugasan.index');
    }
}
