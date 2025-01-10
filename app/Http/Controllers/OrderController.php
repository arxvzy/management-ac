<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.order.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_jasa' => 'required',
            'id_pelanggan' => 'required',
            'jadwal' => 'required|date',
            'metode_pembayaran' => 'required',
            'harga_awal' => "required|numeric",
            'harga_akhir' => "required|numeric",
        ]);

        Order::create($validated);

        return redirect()->route('admin.order.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        return view('admin.order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'id_jasa' => 'required',
            'id_pelanggan' => 'required',
            'jadwal' => 'required|date',
            'metode_pembayaran' => 'required',
            'harga_awal' => "required|numeric",
            'harga_akhir' => "required|numeric",
        ]);

        if($request->has('id_pengguna')){
            $validated['id_pengguna'] = $request->id_pengguna;
        }
        if($request->has('status')){
            $validated['status'] = $request->status;
            if($request->status == 'selesai'){
                $validated['tgl_pengerjaan'] = now();
            }
        }

        if($request->has('testimoni')){
            $validated['testimoni'] = $request->testimoni;
        }

        $order->update($validated);

        return redirect()->route('admin.order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.order.index');
    }

}
