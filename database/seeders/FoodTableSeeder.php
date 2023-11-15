<?php

namespace Database\Seeders;

use App\Models\Food;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Food::factory(20)->create(); // Seed 20 food items, you can adjust the number as needed
    }
}
