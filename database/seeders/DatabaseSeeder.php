<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use App\Models\Products;
use App\Models\ProductSuppliers;
use App\Models\User;
use Database\Factories\ProductCategoryFactory;
use Database\Factories\ProductFactory;
use Database\Factories\ProductSupplierFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'janbai',
        //     'email' => 'janbai@gmail.com',
        // ]);
        //  ProductCategory::factory(5)->create();
        // ProductSuppliers::factory(3)->create();
        // Products::factory(50)->create();

        

        $this->call([

            ProductCategorySeeder::class,
            ProductSupplierSeeder::class,
            ProductSeeder::class,

        ]);
        // \App\Models\ProductCategory::factory(5)->create();
        // \App\Models\ProductSuppliers::factory(3)->create();
        \App\Models\Products::factory(50)->create();

    }
}
