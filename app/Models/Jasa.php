<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    protected $table = 'jasa';

    protected $fillable = [
        'jasa',
        'keterangan',
    ];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
