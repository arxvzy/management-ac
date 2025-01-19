<?php

namespace Database\Factories;

use App\Models\Jasa;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jasa>
 */
class JasaFactory extends Factory
{
    protected $model = Jasa::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'jasa' => $this->faker->unique()->randomElement(['Premium', 'Basic', 'Minimum']),
            'keterangan' => $this->faker->sentence,
        ];
    }
}
