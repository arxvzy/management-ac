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
        $pemasukan = Order::where('status', 'Selesai')->sum('harga_akhir'); 
        $totalPengeluaran = Pengeluaran::sum('nominal');
        $statusOrder = Order::pluck('status');


        $orders = Order::with('jasa', 'pelanggan', 'pengguna')->where('status', 'Selesai')->orderBy('tgl_pengerjaan', 'asc')->paginate(10, ['*'], 'pemasukan_page')->withQueryString();
        $pengeluarans = Pengeluaran::with('pengguna')->orderBy('tgl_pembelian', 'desc')->paginate(10, ['*'], 'pengeluaran_page')->withQueryString();
        return view('admin.index', compact('pelanggan', 'orders', 'pengeluarans', 'pemasukan', 'totalPengeluaran', 'statusOrder'));
    }
}
