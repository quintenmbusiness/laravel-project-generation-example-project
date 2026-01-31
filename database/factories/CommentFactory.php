<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;
use App\Models\User;
class CommentFactory extends Factory {
protected  $model = Comment::class;
public function definition(): array {
        $user = User::factory();

        return [
            'user_id' => $user,
            'commentable_type' => $this->faker->word(),
            'commentable_id' => $this->faker->numberBetween(1, 1000),
            'body' => $this->faker->text(500),
        ];
}
}