<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\FailedJob;
class FailedJobFactory extends Factory {
protected  $model = FailedJob::class;
public function definition(): array {
        return [
            'uuid' => $this->faker->word(),
            'connection' => $this->faker->text(500),
            'queue' => $this->faker->text(500),
            'payload' => $this->faker->text(500),
            'exception' => $this->faker->text(500),
            'failed_at' => $this->faker->dateTime(),
        ];
}
}