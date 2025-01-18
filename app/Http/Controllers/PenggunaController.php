<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penggunas = Pengguna::paginate(10);
        return view('admin.pengguna.index', compact('penggunas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pengguna.tambah');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'nama' => 'required|string|max:255', 
        'username' => 'required|unique:pengguna,username|max:16',
        'password' => 'required|min:6',
        'role' => 'required'
        ]);

        $validated['password'] = bcrypt($request->password);
        Pengguna::create($validated);


        return redirect()->route('admin.pengguna.index')
        ->with('success', 'Pengguna berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengguna $pengguna)
    {
        return view('admin.pengguna.edit', compact('pengguna'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255', 
            'username' => 'required|max:16',
            'role' => 'required',
            'is_active' => 'required|boolean'
            ]);

        $pengguna->update($validated);
        return redirect()->route('admin.pengguna.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
        return redirect()->route('admin.pengguna.index');
    }

}
