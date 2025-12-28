<?php

namespace App\Http\Controllers;

use App\Models\KritikSaran;
use Illuminate\Http\Request;

class KritikSaranController extends Controller
{
    public function index()
    {
        $kritiksarans = KritikSaran::with(['order', 'pelanggan'])->paginate(10);
        return view('admin.kritikSaran.index', compact('kritiksarans'));
    }
}
