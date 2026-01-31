<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;

class CouponFactory extends Factory
{
    protected $model = Coupon::class;

    public function definition(): array
    {
        return [
            'code' => $this->faker->word(),
            'type' => $this->faker->word(),
            'value' => $this->faker->randomFloat(2, 0, 1000),
            'valid_until' => $this->faker->dateTime(),
            'active' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
