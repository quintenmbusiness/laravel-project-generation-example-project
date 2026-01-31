<?php

namespace Database\factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class CustomerFactory extends Factory
{
    protected $model = Customer::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => preg_replace('/[^0-9]/', '', $this->faker->phoneNumber()),
            'metadata' => $this->faker->text(500),
        ];
    }
}
