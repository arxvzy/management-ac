<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use App\Models\Order;
use App\Models\Pengguna;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $orders = Order::with(['jasa', 'pelanggan', 'pengguna'])
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->whereHas('pelanggan', function ($p) use ($search) {
                        $p->where('nama', 'like', "%{$search}%")
                            ->orWhere('no_hp', 'like', "%{$search}%")
                            ->orWhere('alamat', 'like', "%{$search}%");
                    })
                        ->orWhereHas('pengguna', function ($u) use ($search) {
                            $u->where('nama', 'like', "%{$search}%");
                        })
                        ->orWhereHas('jasa', function ($j) use ($search) {
                            $j->where('jasa', 'like', "%{$search}%");
                        });
                });
            })
            ->paginate(10)
            ->withQueryString();

        return view('admin.order.index', compact('orders'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();
        $penggunas = Pengguna::where('role', 'teknisi')->orderBy('nama')->get();
        $jasas = Jasa::orderBy('jasa')->get();
        return view('admin.order.tambah', compact('pelanggans', 'penggunas', 'jasas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_jasa' => 'required',
            'id_pelanggan' => 'required',
            'jadwal' => 'required',
            'harga_awal' => "required|numeric",
        ]);
        if ($request->has('deskripsi')) {
            $validated['deskripsi'] = $request->deskripsi;
        }
        if ($request->has('id_pengguna')) {
            $validated['id_pengguna'] = $request->id_pengguna;
        }
        Order::create($validated);

        return redirect()->route('admin.order.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        $pelanggans = Pelanggan::orderBy('nama')->get();
        $penggunas = Pengguna::where('role', 'teknisi')->orderBy('nama')->get();
        $jasas = Jasa::orderBy('jasa')->get();
        return view('admin.order.edit', compact('order', 'pelanggans', 'penggunas', 'jasas'));
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
            'harga_awal' => "required|numeric",
        ]);
        if ($request->has('deskripsi')) {
            $validated['deskripsi'] = $request->deskripsi;
        }
        if ($request->has('id_pengguna')) {
            $validated['id_pengguna'] = $request->id_pengguna;
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
