<?php

namespace Database\Seeders;

use App\Models\DetailPembelian;
use App\Models\Pembelian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DetailPembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pembelian = Pembelian::first();
        DetailPembelian::create([
            'user_id' => rand(1, 3),
            'pembelian_id'=>$pembelian->id,
            'bahan_id' => 1,
            'jumlah' => 10,
            'harga_satuan' => 20000,
        ]);

        DetailPembelian::create([
            'user_id' => rand(1, 3),
            'pembelian_id'=>$pembelian->id,
            'bahan_id' => 2,
            'jumlah' => 5,
            'harga_satuan' => 40000,
        ]);
    }
}
