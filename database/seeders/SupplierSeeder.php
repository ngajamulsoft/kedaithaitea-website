<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Supplier::create([
            'nama' => 'PT Bahan Makmur',
            'kontak' => '081234567890',
            'alamat' => 'Jl. Industri No. 88, Surabaya',
        ]);
    }
}
