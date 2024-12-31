<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    protected $table = 'pengeluaran';
    protected $fillable = [
        'keterangan',
        'nominal',
        'tgl_pembelian',
        'id_pengguna'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }
}
