<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;
class TagFactory extends Factory {
protected  $model = Tag::class;
public function definition(): array {
        return [
            'name' => $this->faker->name(),
        ];
}
}