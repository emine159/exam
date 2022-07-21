<?php

namespace Database\Seeders;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\QueryException; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::insert([
            'name' => 'Emine Bulut',
            'email' => 'emineblt159@gmail.com',
            'email_verified_at' => now(),
            'type' => 'admin',
            'password' => '123456789', // password
            'remember_token' => Str::random(10),
        ]);

        \App\Models\User::factory(5)->create(); //random uye olusturmak 
    }
}
