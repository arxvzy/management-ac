<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // where status=selesai or status=batal
        $orders = Order::with('jasa', 'pelanggan', 'pengguna')->where('status', 'selesai')->orWhere('status', 'batal')->orderBy('tgl_pengerjaan', 'desc')->get();
        return view('admin.history.index', compact('orders'));
    }


}
