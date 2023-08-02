<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'upc'=>$this->faker->unique()->randomNumber(5, true),
            'name'=>$this->faker->words(3, true),
            'stock'=>$this->faker->numberBetween(0,30),
            'price'=>$this->faker->numberBetween(10000, 100000)
        ];
    }
}
