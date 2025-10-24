<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    /** @use HasFactory<\Database\Factories\BahanFactory> */
    use HasFactory;

    protected $guarded = [];


    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'bahan_supplier', 'bahan_id', 'supplier_id');
    }

    public function detail_pembelian()
    {
        return $this->hasMany(DetailPembelian::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
