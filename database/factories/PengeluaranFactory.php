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
            'nominal' => $this->faker->randomNumber(5),
            'tgl_pembelian' => $this->faker->dateTime(),
            'id_pengguna' => Pengguna::factory(),
        ];
    }
}
