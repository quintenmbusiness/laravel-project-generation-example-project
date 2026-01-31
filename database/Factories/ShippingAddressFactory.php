<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\ShippingAddress;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShippingAddressFactory extends Factory
{
    protected $model = ShippingAddress::class;

    public function definition(): array
    {
        $customer = Customer::factory();

        return [
            'customer_id' => $customer,
            'label' => $this->faker->word(),
            'line1' => $this->faker->word(),
            'line2' => $this->faker->word(),
            'city' => $this->faker->word(),
            'postal_code' => $this->faker->word(),
            'country' => $this->faker->word(),
            'metadata' => $this->faker->text(500),
        ];
    }
}
