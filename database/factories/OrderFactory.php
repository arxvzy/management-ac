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
            'id_jasa' => $this->faker->randomElement(Jasa::pluck('id')->toArray()),
            'id_pengguna' => $this->faker->randomElement(Pengguna::where('role', 'teknisi')->pluck('id')->toArray()),
            'id_pelanggan' => $this->faker->randomElement(Pelanggan::pluck('id')->toArray()),
            'jadwal' => $this->faker->date('Y-m-d', now()->addDays()),
            'metode_pembayaran' => $this->faker->randomElement(['Tunai', 'Transfer']),
            'harga_awal' => $this->faker->numberBetween(100000, 1000000),
            'harga_akhir' => $this->faker->numberBetween(100000, 1000000),
            'tgl_pengerjaan' => $this->faker->optional()->dateTimeBetween('-365 days', '-1 days'),
            'status' => $this->faker->randomElement(['Selesai', 'Batal', null]),
            'is_survey_sent' => false,
            'testimoni' => null,
            'deskripsi' => $this->faker->sentence()
        ];
    }
}
