<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ComputersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('computers')->insert([
                'computer_name' => $faker->word, 
                'model' => $faker->word, 
                'operating_system' => $faker->randomElement(['Windows 10', 'Windows 11', 'Linux', 'macOS']), // Hệ điều hành
                'processor' => $faker->randomElement(['Intel Core i5-11400', 'Intel Core i7-9700', 'AMD Ryzen 5 3600']), // Bộ vi xử lý
                'memory' => $faker->numberBetween(4, 64), 
                'available' => $faker->boolean, 
            ]);
        }
    }
}