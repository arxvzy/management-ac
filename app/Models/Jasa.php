<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jasa extends Model
{
    use HasFactory;
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
