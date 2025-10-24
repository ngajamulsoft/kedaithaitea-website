<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemakaian extends Model
{
    protected $fillable = [
        'bahan_id',
        'jumlah',
        'tanggal',
        'keterangan'
    ];

    public function bahan()
    {
        return $this->belongsTo(Bahan::class);
    }       
}
