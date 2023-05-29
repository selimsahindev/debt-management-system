<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Customer::factory(10)->create();

        \App\Models\User::factory()->create([
            'first_name' => 'Developer',
            'last_name' => 'Test',
            'email' => 'developer@test.com',
            'password' => bcrypt('123123123'),
        ]);
    }
}
