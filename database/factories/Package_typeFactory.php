<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package_type>
 */
class Package_typeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(1),
            'status' => $this->faker->randomElement(['active', 'deactive']),
            'package_category_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
