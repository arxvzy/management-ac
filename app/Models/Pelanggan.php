<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggan';
    protected $fillable = [
        'nama',
        'no_hp',
        'alamat',
        'koordinat',
        'is_reminded'
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'id_pelanggan');
    }
}
