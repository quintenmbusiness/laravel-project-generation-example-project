<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Migration;
class MigrationFactory extends Factory {
protected  $model = Migration::class;
public function definition(): array {
        return [
            'migration' => $this->faker->word(),
            'batch' => $this->faker->numberBetween(1, 1000),
        ];
}
}