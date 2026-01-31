<?php

namespace Database\Factories;

use App\Models\CacheLock;
use Illuminate\Database\Eloquent\Factories\Factory;

class CacheLockFactory extends Factory
{
    protected $model = CacheLock::class;

    public function definition(): array
    {
        return [
            'key' => $this->faker->word(),
            'owner' => $this->faker->word(),
            'expiration' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
