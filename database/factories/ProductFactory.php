<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
    	return [
            'name' => $this->faker->name,
            'description' => $this->faker->name,
            'price' => $this->faker->numberBetween(10,200),
            'image_link'=> 'test'
        ];
    }
}
