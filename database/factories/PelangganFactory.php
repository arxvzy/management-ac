<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
{
    protected $model = Pelanggan::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'is_reminded' => false,
            'no_hp' => '62' . ltrim($this->faker->numerify('8##########'), '0'),
            'alamat' => $this->faker->address,
            'koordinat' => "https://maps.app.goo.gl/...",
        ];
    }
}
