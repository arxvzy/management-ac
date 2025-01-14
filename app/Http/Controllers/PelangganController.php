<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('admin.pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama' => 'required|string|max:255', 
        'alamat' => 'required',
        'no_hp' => 'required|numeric',
        'koordinat' => 'required'
        ]);

        $pelanggan = Pelanggan::create($validated);
        return redirect()->route('admin.pelanggan.index')
        ->with('success', 'Pelanggan berhasil ditambahkan');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        return view('admin.pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        $validated = $request->validate([
        'nama' => 'required|string|max:255', 
        'alamat' => 'required',
        'no_hp' => 'required',
        'koordinat' => 'required'
        ]);

        $pelanggan->update($validated);
        return redirect()->route('admin.pelanggan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect()->route('admin.pelanggan.index');
    }
}
