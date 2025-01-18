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
    public function index(Request $request)
    {
        if($request->has('from') && $request->has('to')) {
            $pelanggan = Pelanggan::whereBetween('created_at', [$request->from, $request->to])->count();
            $pemasukan = Order::whereBetween('tgl_pengerjaan', [$request->from, $request->to])->where('status', 'Selesai')->sum('harga_akhir'); 
            $totalPengeluaran = Pengeluaran::whereBetween('tgl_pembelian', [$request->from, $request->to])->sum('nominal');
            $statusOrder = Order::whereBetween('tgl_pengerjaan', [$request->from, $request->to])->pluck('status');

            $orders = Order::with('jasa', 'pelanggan', 'pengguna')->whereBetween('tgl_pengerjaan', [$request->from, $request->to])->orderBy('created_at', 'asc')->get();
            $pengeluarans = Pengeluaran::with('pengguna')->whereBetween('tgl_pembelian', [$request->from, $request->to])->orderBy('tgl_pembelian', 'desc')->get();
        } else {
            $pelanggan = Pelanggan::count();
            $pemasukan = Order::where('status', 'Selesai')->sum('harga_akhir'); 
            $totalPengeluaran = Pengeluaran::sum('nominal');
            $statusOrder = Order::pluck('status');
    
    
            $orders = Order::with('jasa', 'pelanggan', 'pengguna')->where('status', 'Selesai')->orderBy('created_at', 'asc')->paginate(10, ['*'], 'pemasukan_page')->withQueryString();
            $pengeluarans = Pengeluaran::with('pengguna')->orderBy('tgl_pembelian', 'desc')->paginate(10, ['*'], 'pengeluaran_page')->withQueryString();
        }

        return view('admin.index', compact('pelanggan', 'orders', 'pengeluarans', 'pemasukan', 'totalPengeluaran', 'statusOrder'));
    }
}
