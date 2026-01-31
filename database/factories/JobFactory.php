<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Job;
class JobFactory extends Factory {
protected  $model = Job::class;
public function definition(): array {
        return [
            'queue' => $this->faker->word(),
            'payload' => $this->faker->text(500),
            'attempts' => $this->faker->numberBetween(1, 1000),
            'reserved_at' => $this->faker->numberBetween(1, 1000),
            'available_at' => $this->faker->numberBetween(1, 1000),
        ];
}
}