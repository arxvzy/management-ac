<?php

namespace App\Http\Controllers;

use App\Models\Jasa;
use Illuminate\Http\Request;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jasas = Jasa::all();
        return view('admin.jasa.index', compact('jasas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.jasa.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "jasa" => "required",
            "keterangan" => "required"
        ]);

        Jasa::create($validated);

        return redirect()->route('admin.jasa.index')
            ->with('success', 'Jasa berhasil ditambahkan');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jasa $jasa)
    {
        return view('admin.jasa.edit', compact('jasa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jasa $jasa)
    {
        $validated = $request->validate([
            "jasa" => "required",
            "keterangan" => "required"
        ]);

        $jasa->update($validated);
        return redirect()->route('admin.jasa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jasa $jasa)
    {
        $jasa->delete();
        return redirect()->route('admin.jasa.index');
    }
}
