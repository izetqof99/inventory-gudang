<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
        RoleSeeder::class,
        ]);
        User::factory()->create([
            'name' => 'izet',
            'email' => 'izet@gmail.com',
            'password' => 'Electrohell',
            'role_id' => 1,
        ]);

        User::factory()->create([
            'name' => 'Farid',
            'email' => 'farid@gmail.com',
            'password' => bcrypt('farid12345'),
            'role_id' => 2,
        ]);
    }
}
