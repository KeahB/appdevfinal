<?php

namespace Database\Factories;

use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{   
    protected $model = \App\Models\Products::class;


    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        
        $name  = $this->faker->unique()->word();
        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'image' => $this->faker->imageUrl(640, 480, 'products', true),
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'quantity' => $this->faker->numberBetween(1, 100),
            'product_categories_id' => $this->faker->numberBetween(1, 5),
            'product_suppliers_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
