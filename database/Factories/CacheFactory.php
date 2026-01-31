<?php

namespace Database\Factories;

use App\Models\Cache;
use Illuminate\Database\Eloquent\Factories\Factory;

class CacheFactory extends Factory
{
    protected $model = Cache::class;

    public function definition(): array
    {
        return [
            'key' => $this->faker->word(),
            'value' => $this->faker->text(500),
            'expiration' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
