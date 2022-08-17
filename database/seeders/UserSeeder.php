<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            \App\Models\User::insert([
            'name' => 'Emine Bulut',
            'email' => 'emineblt159@gmail.com',
            'phone_number' => '5431611111',
            'branch' => 'Müdür',
            'email_verified_at' => now(),
            'type' => 'admin',
            'password' => '$2y$10$su3oYQ1T8/omTDYfx0a99uMgdExVLe8pXWqNYjcxmHXJcnOQr3YMa', // password
            'remember_token' => Str::random(10),
        ]);

         \App\Models\User::factory(20)->create(); //random uye olusturmak 
    }
}
