<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\User;

class InitRandomUser extends Command
{
    protected $signature = 'init:randomuser';

    protected $description = 'Initialize a random user with random data';

    public function handle()
    {
        $faker = Faker::create();

        $email = $faker->email;
        $password = $faker->password;

        $user = User::create([
            'name' => $faker->name,
            'email' => $faker->email,
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $this->info('Random User Created:');
        $this->line('Email: ' . $email);
        $this->line('Password: ' . $password);
    }
}
