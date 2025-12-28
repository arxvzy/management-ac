<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pelanggan;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // =========================
        // Financial date range only
        // =========================
        if ($request->has('from') && $request->has('to')) {
            $financialFrom = Carbon::parse($request->from)->startOfDay();
            $financialTo   = Carbon::parse($request->to)->endOfDay();
        } else {
            $financialFrom = now()->startOfMonth();
            $financialTo   = now()->endOfMonth();
        }

        // =========================
        // Non-financial (GLOBAL)
        // =========================
        $year = now()->year;

        $pelanggan = Pelanggan::count();

        // =========================
        // Financial cards
        // =========================
        $pemasukan = Order::whereBetween('tgl_pengerjaan', [$financialFrom, $financialTo])
            ->where('status', 'Selesai')
            ->sum('harga_akhir');

        $totalPengeluaran = Pengeluaran::whereBetween('tgl_pembelian', [$financialFrom, $financialTo])
            ->sum('nominal');

        $statusOrder = Order::whereBetween('tgl_pengerjaan', [$financialFrom, $financialTo])
            ->pluck('status');

        // =========================
        // Financial tables
        // =========================
        $orders = Order::with('jasa', 'pelanggan', 'pengguna')
            ->whereBetween('tgl_pengerjaan', [$financialFrom, $financialTo])
            ->where('status', 'Selesai')
            ->orderBy('created_at', 'asc')
            ->paginate(10)
            ->withQueryString();

        $pengeluarans = Pengeluaran::with('pengguna')
            ->whereBetween('tgl_pembelian', [$financialFrom, $financialTo])
            ->orderBy('tgl_pembelian', 'desc')
            ->paginate(10)
            ->withQueryString();

        // =========================
        // Chart (GLOBAL yearly)
        // =========================
        $income = Order::select(
                DB::raw('MONTH(tgl_pengerjaan) as month'),
                DB::raw('SUM(harga_akhir) as total')
            )
            ->whereYear('tgl_pengerjaan', $year)
            ->where('status', 'Selesai')
            ->groupBy(DB::raw('MONTH(tgl_pengerjaan)'))
            ->pluck('total', 'month');

        $outcome = Pengeluaran::select(
                DB::raw('MONTH(tgl_pembelian) as month'),
                DB::raw('SUM(nominal) as total')
            )
            ->whereYear('tgl_pembelian', $year)
            ->groupBy(DB::raw('MONTH(tgl_pembelian)'))
            ->pluck('total', 'month');

        // Normalize to 12 months
        $months = collect(range(1, 12));
        $incomePerMonth = $months->map(fn ($m) => $income[$m] ?? 0);
        $outcomePerMonth = $months->map(fn ($m) => $outcome[$m] ?? 0);

        $chartLabels = [
            'Jan','Feb','Mar','Apr','Mei','Jun',
            'Jul','Agu','Sep','Okt','Nov','Des'
        ];

        return view('admin.index', compact(
            'pelanggan',
            'orders',
            'pengeluarans',
            'pemasukan',
            'totalPengeluaran',
            'statusOrder',
            'chartLabels',
            'incomePerMonth',
            'outcomePerMonth'
        ));
    }
}
