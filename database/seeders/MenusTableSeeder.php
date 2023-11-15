<?php

namespace Database\Seeders;

use App\Models\Menue;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menue::factory(1)->create(); // Seed 20 menu items, you can adjust the number as needed

    }
}
