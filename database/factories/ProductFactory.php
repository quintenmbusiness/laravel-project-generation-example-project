<?php

namespace Database\factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $category = Category::factory();

        return [
            'category_id' => $category,
            'sku' => $this->faker->word(),
            'title' => $this->faker->word(),
            'description' => $this->faker->text(500),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'metadata' => $this->faker->text(500),
            'active' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
