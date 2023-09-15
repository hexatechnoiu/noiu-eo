<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'picture' => 'https://source.unsplash.com/random/1202x866',
            'name' => $this->faker->name(),
            'category' => $this->faker->sentence(1),
            'price' => $this->faker->numberBetween(125000, 1250000),
            'unit' => $this->faker->sentence(1),
            'desc' => $this->faker->sentence(20),
            'package_type_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}