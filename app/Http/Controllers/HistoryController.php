<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $orders = Order::with(['jasa', 'pelanggan', 'pengguna'])
            ->whereIn('status', ['selesai', 'batal'])
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->whereHas('pelanggan', function ($p) use ($search) {
                        $p->where('nama', 'like', "%{$search}%")
                            ->orWhere('no_hp', 'like', "%{$search}%");
                    })
                        ->orWhereHas('pengguna', function ($u) use ($search) {
                            $u->where('nama', 'like', "%{$search}%");
                        });
                });
            })
            ->orderBy('tgl_pengerjaan', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('admin.history.index', compact('orders'));
    }
}
