<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengeluarans = Pengeluaran::with('pengguna')->orderBy('created_at', 'desc')->get();
        return view('admin.pengeluaran.index', compact('pengeluarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengeluaran.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'keterangan' => 'required',
            'nominal' => 'required|numeric',
            'tgl_pembelian' => 'required|date',
        ]);

        $validated['id_pengguna'] = Auth::id();

        Pengeluaran::create($validated);

        return redirect()->route('admin.pengeluaran.index')
            ->with('success', 'Pengeluaran berhasil ditambahkan');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengeluaran $pengeluaran)
    {
        return view('admin.pengeluaran.edit', compact('pengeluaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengeluaran $pengeluaran)
    {
        $validated = $request->validate([
            'keterangan' => 'required',
            'nominal' => 'required|numeric',
            'tgl_pembelian' => 'required|date',
        ]);

        $pengeluaran->update($validated);

        return redirect()->route('admin.pengeluaran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengeluaran $pengeluaran)
    {
        $pengeluaran->delete();
        return redirect()->route('admin.pengeluaran.index');
    }
}
