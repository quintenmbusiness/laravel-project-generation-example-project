<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\CacheLock;
class CacheLockFactory extends Factory {
protected  $model = CacheLock::class;
public function definition(): array {
        return [
            'key' => $this->faker->word(),
            'owner' => $this->faker->word(),
            'expiration' => $this->faker->numberBetween(1, 1000),
        ];
}
}