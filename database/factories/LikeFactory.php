<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Like;
use App\Models\User;
class LikeFactory extends Factory {
protected  $model = Like::class;
public function definition(): array {
        $user = User::factory();

        return [
            'user_id' => $user,
            'likeable_type' => $this->faker->word(),
            'likeable_id' => $this->faker->numberBetween(1, 1000),
        ];
}
}