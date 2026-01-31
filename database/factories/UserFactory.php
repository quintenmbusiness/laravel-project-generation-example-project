<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class UserFactory extends Factory {
protected  $model = User::class;
public function definition(): array {
        return [
            'username' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'status' => $this->faker->word(),
            'role' => $this->faker->word(),
            'preferences' => $this->faker->text(500),
            'last_seen_at' => $this->faker->dateTime(),
        ];
}
}