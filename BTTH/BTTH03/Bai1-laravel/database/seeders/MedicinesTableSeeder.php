<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MedicinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 100; $i++) {
            DB::table('medicines')->insert([
                'name' => $faker->word, 
                'brand' => $faker->company, 
                'dosage' => $faker->randomElement(['10mg', '50mg', '100mg']), 
                'form' => $faker->randomElement(['viên nén', 'viên nang', 'xi-rô', 'kem bôi']), 
                'price' => $faker->randomFloat(2, 1, 1000), 
                'stock' => $faker->numberBetween(0, 1000) 
            ]);
        }
    }
}
