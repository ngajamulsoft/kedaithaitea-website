<?php

namespace Database\Seeders;

use App\Models\DetailPembelian;
use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $detail = DetailPembelian::first();
        Stock::create([
            'bahan_id'=>1,
            'jumlah'=>$detail->jumlah,
            'tipe'=>'masuk',
            'tanggal'=>$detail->pembelian->tanggal,
            'keterangan'=>'Stok awal dari Detail pembelian  ID '.$detail->id,
        ]);
    }
}
