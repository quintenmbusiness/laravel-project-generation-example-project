<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use App\Models\User;
class ProfileFactory extends Factory {
protected  $model = Profile::class;
public function definition(): array {
        $user = User::factory();

        return [
            'user_id' => $user,
            'display_name' => $this->faker->name(),
            'bio' => $this->faker->text(500),
            'avatar_path' => $this->faker->word(),
        ];
}
}