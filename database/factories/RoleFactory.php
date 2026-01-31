<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
class RoleFactory extends Factory {
protected  $model = Role::class;
public function definition(): array {
        return [
            'name' => $this->faker->name(),
        ];
}
}