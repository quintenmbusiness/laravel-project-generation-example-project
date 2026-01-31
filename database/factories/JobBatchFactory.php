<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\JobBatch;
class JobBatchFactory extends Factory {
protected  $model = JobBatch::class;
public function definition(): array {
        return [
            'name' => $this->faker->name(),
            'total_jobs' => $this->faker->numberBetween(1, 1000),
            'pending_jobs' => $this->faker->numberBetween(1, 1000),
            'failed_jobs' => $this->faker->numberBetween(1, 1000),
            'failed_job_ids' => $this->faker->text(500),
            'options' => $this->faker->text(500),
            'cancelled_at' => $this->faker->numberBetween(1, 1000),
            'finished_at' => $this->faker->numberBetween(1, 1000),
        ];
}
}