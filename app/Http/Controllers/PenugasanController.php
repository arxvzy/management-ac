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
            $orders = Order::query()
                ->orderByRaw("CASE 
        WHEN status IS NULL OR status = '' THEN 0 
        WHEN status = 'Selesai' THEN 1 
        WHEN status = 'Batal' THEN 2 
    END")->where('id_pengguna', $user->id)->get();
        } else {
            $orders = Order::query()
                ->orderByRaw("CASE 
        WHEN status IS NULL OR status = '' THEN 0 
        WHEN status = 'Selesai' THEN 1 
        WHEN status = 'Batal' THEN 2 
    END")
                ->get();
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
                $order['tgl_pengerjaan'] = now();
                $order->pelanggan->update(['is_reminded' => false]);
            }
        }
        $order->save();
        return redirect()->route('admin.penugasan.index');
    }
}
