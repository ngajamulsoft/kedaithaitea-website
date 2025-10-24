<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPembelian extends Model
{
    protected $guarded = [];

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class);
    }

    public function bahan()
    {
        return $this->belongsTo(Bahan::class);
    }
}
