<?php

namespace Database\factories;

use App\Models\BillingAddress;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class BillingAddressFactory extends Factory
{
    protected $model = BillingAddress::class;

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
