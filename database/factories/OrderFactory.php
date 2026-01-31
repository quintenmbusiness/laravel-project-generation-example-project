<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\BillingAddress;
use App\Models\Customer;
use App\Models\ShippingAddress;
class OrderFactory extends Factory {
protected  $model = Order::class;
public function definition(): array {
        $billingAddress = BillingAddress::factory();
        $customer = Customer::factory();
        $shippingAddress = ShippingAddress::factory();

        return [
            'billing_address_id' => $billingAddress,
            'customer_id' => $customer,
            'shipping_address_id' => $shippingAddress,
            'order_number' => $this->faker->word(),
            'total_amount' => $this->faker->randomFloat(2, 0, 1000),
            'discount_amount' => $this->faker->randomFloat(2, 0, 1000),
            'status' => $this->faker->word(),
            'metadata' => $this->faker->text(500),
        ];
}
}