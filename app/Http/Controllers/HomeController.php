<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pelanggan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::count();
        $orders = Order::with('jasa', 'pelanggan', 'pengguna')->get();
        $pengeluarans = Pengeluaran::with('pengguna')->get();
        $pemasukan = Order::where('status', 'Selesai')->sum('harga_akhir'); 
        return view('admin.index', compact('pelanggan', 'orders', 'pengeluarans', 'pemasukan'));
    }
}
