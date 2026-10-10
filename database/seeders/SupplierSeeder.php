<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $suppliers = [
            [
                'name'    => 'PT. Indofood Sukses Makmur',
                'phone'   => '021-57958822',
                'address' => 'Jl. Jend. Sudirman Kav. 76-78, Jakarta Selatan',
            ],
            [
                'name'    => 'PT. Unilever Indonesia',
                'phone'   => '021-52991000',
                'address' => 'Grha Unilever, BSD Green Office Park, Tangerang',
            ],
            [
                'name'    => 'PT. Mayora Indah',
                'phone'   => '021-5522322',
                'address' => 'Jl. Tomang Raya No. 21-23, Jakarta Barat',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::create($supplier);
        }
    }
}
