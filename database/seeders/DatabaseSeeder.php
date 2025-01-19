<?php

namespace Database\Seeders;

use App\Models\Jasa;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Order;
use App\Models\Pengguna;
use App\Models\Pelanggan;
use App\Models\Pengeluaran;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Pengguna::factory()->create([
            'nama' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('Admin423!'),
            'role' => 'admin',
            'is_active' => true
        ]);

        Pengguna::factory(5)->create();
        Pelanggan::factory(5)->create();
        Jasa::factory(3)->create();
        Pengeluaran::factory(5)->create();
        Order::factory(20)->create();
    }
}
