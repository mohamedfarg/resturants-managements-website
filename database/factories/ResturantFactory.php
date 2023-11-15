<?php

namespace Database\Factories;

use App\Models\Resturant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Resturant>
 */
class ResturantFactory extends Factory
{
    protected $model = Resturant::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'address' => $this->faker->address,
            'phone_number' => $this->faker->phoneNumber,
            'website' => $this->faker->url,
        ];
    }
}
