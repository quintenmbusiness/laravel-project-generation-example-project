<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\ProductVariant;
use App\Models\Product;
class ProductVariantFactory extends Factory {
protected  $model = ProductVariant::class;
public function definition(): array {
        $product = Product::factory();

        return [
            'product_id' => $product,
            'sku' => $this->faker->word(),
            'name' => $this->faker->name(),
            'price' => $this->faker->randomFloat(2, 0, 1000),
            'stock' => $this->faker->numberBetween(1, 1000),
            'attributes' => $this->faker->text(500),
        ];
}
}