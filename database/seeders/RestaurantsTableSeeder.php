<?php

namespace Database\Seeders;

use App\Models\Resturant;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RestaurantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Resturant::factory(10)->create(); // Seed 10 restaurants, you can adjust the number as needed

    }
}
