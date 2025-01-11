<?php

namespace Database\Seeders;

use App\Models\Pengguna;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Pengguna::factory()->create([
            'nama' => 'Init Admin',
            'username' => 'initadmin',
            'password' => bcrypt('123456'),
            'role' => 'admin',
            'is_active' => true
        ]);
    }
}
