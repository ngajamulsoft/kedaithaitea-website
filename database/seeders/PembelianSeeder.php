<?php

namespace Database\Seeders;

use App\Models\Pembelian;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pembelian::create([
            'supplier_id' => 1,
            'tanggal' => now()->subDays(3),
            'total' => 500000,
        ]);
    }
}
