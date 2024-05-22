<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('games')->insert([
                'name' => fake()->name(),
                'duration' => fake()->numberBetween(1, 10),
                'genre' => fake()->text(10),
                'price' => fake()->numberBetween(1, 10),
            ]);
        };
    }
}
