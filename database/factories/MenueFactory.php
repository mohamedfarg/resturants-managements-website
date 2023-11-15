<?php

namespace Database\Factories;

use App\Models\Menue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menue>
 */
class MenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Menue::class;

    public function definition()
    {
        return [
            'resturant_id' => 1,

        ];
    }
}
