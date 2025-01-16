<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminIndex()
    {
        $orders = Order::with('jasa', 'pelanggan', 'pengguna')->where('is_survey_sent', false)->where('status', 'selesai')->get();
        return view('admin.survey.index', compact('orders'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function adminUpdate(Request $request, Order $order)
    {
        $order->is_survey_sent = true;
        $order->save();

        $message = "Halo, {{$order->pelanggan->nama}}\n\n" .
            "Jika berkenan, silahkan isi survey di link berikut http:// untuk masukan dan evaluasi atas pekerjaan kami.
";

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
            'testimoni' => 'required',
        ]);

        $order->testimoni = $request->testimoni;
        $order->save();
        return redirect()->route('survey.show', $order->id);
    }
}
