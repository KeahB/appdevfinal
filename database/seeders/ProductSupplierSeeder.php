<?php

namespace Database\Seeders;

use App\Models\ProductSuppliers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductSuppliers::insert([
            ['name' => 'Supplier A', 'email' => 'supplierA@example.com', 'phone' => '1234567890', 'category_id' => 1],
            ['name' => 'Supplier B', 'email' => 'supplierB@example.com', 'phone' => '0987654321', 'category_id' => 2],
            ['name' => 'Supplier C', 'email' => 'supplierC@example.com', 'phone' => '1122334455', 'category_id' => 3],
        ]);
    }
}
