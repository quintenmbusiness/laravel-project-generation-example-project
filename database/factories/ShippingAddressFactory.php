<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\ShippingAddress;
use App\Models\Customer;
class ShippingAddressFactory extends Factory {
protected  $model = ShippingAddress::class;
public function definition(): array {
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