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
            'picture' => 'https://source.unsplash.com/random/96x96',
            'name' => $this->faker->name(),
            'desc' => $this->faker->sentence(mt_rand(1, 10)),
            'price' => $this->faker->numberBetween(125000, 1250000),
            'unit' => $this->faker->sentence(1),
            'package_type_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
