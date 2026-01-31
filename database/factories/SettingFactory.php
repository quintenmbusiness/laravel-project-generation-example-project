<?php
namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;
class SettingFactory extends Factory {
protected  $model = Setting::class;
public function definition(): array {
        return [
            'key' => $this->faker->word(),
            'value' => $this->faker->word(),
        ];
}
}