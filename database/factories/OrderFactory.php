<?php

namespace Database\Factories;

use App\Models\Jasa;
use App\Models\Order;
use App\Models\Pengguna;
use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = Order::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_jasa' => Jasa::factory(),
            'id_pengguna' => Pengguna::factory(),
            'id_pelanggan' => Pelanggan::factory(),
            'jadwal' => $this->faker->date('Y-m-d', now()->addDays()),
            'metode_pembayaran' => $this->faker->randomElement(['COD', 'Transfer']),
            'harga_awal' => $this->faker->numberBetween(10000, 50000),
            'harga_akhir' => $this->faker->numberBetween(50000, 100000),
            'tgl_pengerjaan' => $this->faker->optional()->dateTimeBetween('+2 days', '+1 months'),
            'status' => $this->faker->randomElement(['Menunggu', 'Proses', 'Selesai', 'Batal']),
            'testimoni' => $this->faker->optional()->sentence,
        ];
    }
}
