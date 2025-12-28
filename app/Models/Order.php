<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';

    protected $fillable = [
        'id_jasa',
        'id_pengguna',
        'id_pelanggan',
        'jadwal',
        'metode_pembayaran',
        'harga_awal',
        'harga_akhir',
        'tgl_pengerjaan',
        'status',
        'testimoni',
        'deskripsi',
        'is_survey_sent'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'id_pengguna');
    }

    public function jasa()
    {
        return $this->belongsTo(Jasa::class, 'id_jasa');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function kritikSaran()
    {
        return $this->hasOne(KritikSaran::class, 'id_order');
    }
}
