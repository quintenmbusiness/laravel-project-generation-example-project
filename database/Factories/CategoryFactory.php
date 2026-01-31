<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'slug' => $this->faker->word(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(500),
            'metadata' => $this->faker->text(500),
        ];
    }
}
