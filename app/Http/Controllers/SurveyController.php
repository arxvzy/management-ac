<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminIndex()
    {
        $orders = Order::with('jasa', 'pelanggan', 'pengguna')->where('status', 'selesai')->orderBy('tgl_pengerjaan', 'desc')->paginate(10);
        return view('admin.survey.index', compact('orders'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function adminUpdate(Request $request, Order $order)
    {
        $order->is_survey_sent = true;
        $order->save();

        $message = "Halo, {$order->pelanggan->nama}.\n\n" .
        "Terima kasih telah menggunakan layanan kami.\n\n" .
        "Kami sangat menghargai apabila Anda bersedia mengisi survey pada link berikut:\n" .
        env('APP_URL') . "/survey/{$order->id}\n\n" .
        "Masukan berupa kritik dan saran dari Anda akan sangat membantu kami dalam meningkatkan kualitas pelayanan ke depannya.\n\n" .
        "Terima kasih atas waktu dan kepercayaannya.";
    

        $encodedMessage = urlencode($message);

        $whatsAppUrl = "https://wa.me/{$order->pelanggan->no_hp}?text={$encodedMessage}";
        return view('admin.survey.redirect', ['url' => $whatsAppUrl]);
    }

    public function clientIndex(Order $order)
    {
        if(is_null($order->testimoni)){
            return view('client.survey.review', compact('order'));
        }   
        return view('client.survey.thanks');
    }

    public function clientUpdate(Request $request, Order $order)
    {
        $validated = $request->validate([
            'testimoni' => 'required|string',
            'kritik_saran' => 'required|string',
        ]);

        $order->testimoni = $validated['testimoni'];
        $order->kritikSaran()->create([
            'id_order' => $order->id,
            'kritik_saran' => $validated['kritik_saran'],
            'id_pelanggan' => $order->id_pelanggan,
        ]);

        $order->save();
        return redirect()->route('survey.show', $order->id);
    }
}
