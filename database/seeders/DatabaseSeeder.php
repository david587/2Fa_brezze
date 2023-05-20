<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    

    public function run(): void
    {
        company::factory()->count(5)->create();
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'test',
            'email' => 'davidbarath08@gmail.com',
            'password' => Hash::make('123456')
        ]);
    }
}
