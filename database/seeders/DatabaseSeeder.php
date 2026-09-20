<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::firstOrCreate(
        //     ['email' => 'abdullah.term369@gmail.com'],
        //     ['name' => 'Test User', 'password' => bcrypt('password')]
        // );

        User::firstOrCreate(
            ['email' => 'admin@nexagtm.com'],
            [
                'name' => 'Hammad',
                'email' => 'admin@nexagtm.com',
                'password' => Hash::make('Hammad@123'),
            ]
        );

    }
}
