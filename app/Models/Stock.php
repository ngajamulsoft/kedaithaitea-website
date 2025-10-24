<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    /** @use HasFactory<\Database\Factories\StockFactory> */
    use HasFactory;

    protected $fillable = [
        'bahan_id',
        'jumlah_stok',
        'tanggal',
        'jenis_transaksi',
        'keterangan'
    ];

    public function bahans()
    {
        return $this->belongsTo(Bahan::class);
    }
}
