<?php

namespace Database\Seeders;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // Her seedi ayrı çağırmak için bu yöntemi kullanıyoruz.
        $this->call([
            UserSeeder::class,  
            ExamSeeder::class, 
        ]);

        
    }
}
