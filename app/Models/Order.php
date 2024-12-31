<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'id_jasa',
        'id_pengguna',
        'id_pelanggan',
        'jadwal',
        'harga_awal',
        'harga_akhir',
        'tgl_pengerjaan',
        'status',
        'testimoni'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }

    public function jasa()
    {
        return $this->belongsTo(Jasa::class);
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class);
    }
}
