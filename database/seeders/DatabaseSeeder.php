<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Jalankan Seeder Kategori terlebih dahulu agar data kategorinya ada
        $this->call(CategorySeeder::class);

        // 2. Jalankan Seeder Supplier (tugas mandiri)
        $this->call(SupplierSeeder::class);

        $this->call(UserSeeder::class);

        // 3. Jalankan Factory Produk untuk membuat 50 data dummy produk
        Product::factory(50)->create();
    }
}
