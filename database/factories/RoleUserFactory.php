<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\RoleUser;
use App\Models\Role;
use App\Models\User;
class RoleUserFactory extends Factory {
protected  $model = RoleUser::class;
public function definition(): array {
        $role = Role::factory();
        $user = User::factory();

        return [
            'role_id' => $role,
            'user_id' => $user,
        ];
}
}