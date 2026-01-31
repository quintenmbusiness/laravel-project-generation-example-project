<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Models\User;
class PostFactory extends Factory {
protected  $model = Post::class;
public function definition(): array {
        $user = User::factory();

        return [
            'user_id' => $user,
            'title' => $this->faker->word(),
            'body' => $this->faker->text(500),
            'is_published' => $this->faker->numberBetween(1, 1000),
            'metadata' => $this->faker->text(500),
        ];
}
}