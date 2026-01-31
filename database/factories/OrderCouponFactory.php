<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\OrderCoupon;
use App\Models\Coupon;
use App\Models\Order;
class OrderCouponFactory extends Factory {
protected  $model = OrderCoupon::class;
public function definition(): array {
        $coupon = Coupon::factory();
        $order = Order::factory();

        return [
            'coupon_id' => $coupon,
            'order_id' => $order,
            'discount_amount' => $this->faker->randomFloat(2, 0, 1000),
        ];
}
}