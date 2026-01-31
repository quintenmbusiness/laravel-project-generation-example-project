<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\ProductVariant;
class OrderProductFactory extends Factory {
protected  $model = OrderProduct::class;
public function definition(): array {
        $order = Order::factory();
        $productVariant = ProductVariant::factory();

        return [
            'order_id' => $order,
            'product_variant_id' => $productVariant,
            'quantity' => $this->faker->numberBetween(1, 1000),
            'unit_price' => $this->faker->randomFloat(2, 0, 1000),
            'total_price' => $this->faker->randomFloat(2, 0, 1000),
            'metadata' => $this->faker->text(500),
        ];
}
}