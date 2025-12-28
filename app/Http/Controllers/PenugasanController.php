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
                ->whereNull('status')->latest()->paginate(10);
        } else {
            $orders = Order::whereNull('status')->latest()->paginate(10);
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
        $validated = $request->validate([
            'harga_akhir' => 'required|numeric',
            'metode_pembayaran' => 'required',
            'status' => 'required',
        ]);
        
        if ($request->status == 'Selesai') {
            $order->pelanggan->update(['is_reminded' => false]);
        }

        $validated['tgl_pengerjaan'] = now();
        $order->update($validated);
        return redirect()->route('admin.penugasan.index');
    }
}
