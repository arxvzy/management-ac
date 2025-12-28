<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KritikSaran extends Model
{
    protected $table = 'kritik_saran';

    protected $fillable = [
        'id_order',
        'id_pelanggan',
        'kritik_saran',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }
}
