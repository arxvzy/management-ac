<?php

namespace Database\Factories;

use App\Models\Pengguna;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengguna>
 */
class PenggunaFactory extends Factory
{
    protected $model = Pengguna::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'username' => $this->faker->unique()->userName,
            'password' => bcrypt('123456'),
            'is_active' => $this->faker->boolean,
            'role' => $this->faker->randomElement(['admin', 'teknisi']),
        ];
    }
}
