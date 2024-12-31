<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    protected $table = 'pelanggan';
    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
        'koordinat'
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
