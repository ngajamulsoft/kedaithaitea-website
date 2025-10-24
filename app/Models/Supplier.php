<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    /** @use HasFactory<\Database\Factories\SupplierFactory> */
    use HasFactory;

    protected $fillable = [
        'nama_supplier',
        'kontak_supplier',
        'alamat_supplier'
    ];

    public function pembelians()
    {
        return $this->hasMany(Pembelian::class);
    }
}
