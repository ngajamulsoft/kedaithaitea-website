<?php

namespace Database\Seeders;
use App\Models\Bahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bahan::create([
            'nama' => 'Gula Pasir',
            'satuan' => 'kg',
            'kode' => 'gula01',
        ]);

        Bahan::create([
            'nama' => 'Tepung Terigu',
            'satuan' => 'kg',
            'kode' => 'tepung01',
        ]);

    }
}
