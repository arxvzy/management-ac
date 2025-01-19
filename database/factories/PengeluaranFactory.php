<?php

namespace Database\Factories;

use App\Models\Pengguna;
use App\Models\Pengeluaran;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pengeluaran>
 */
class PengeluaranFactory extends Factory
{
    protected $model = Pengeluaran::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'keterangan' => $this->faker->sentence,
            'nominal' => $this->faker->randomNumber(6),
            'tgl_pembelian' => $this->faker->dateTimeBetween('-6 months', 'now'),
            'id_pengguna' => $this->faker->randomElement(Pengguna::pluck('id')->toArray()),
        ];
    }
}
