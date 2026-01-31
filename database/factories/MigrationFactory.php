<?php

namespace Database\factories;

use App\Models\Migration;
use Illuminate\Database\Eloquent\Factories\Factory;

class MigrationFactory extends Factory
{
    protected $model = Migration::class;

    public function definition(): array
    {
        return [
            'migration' => $this->faker->word(),
            'batch' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
