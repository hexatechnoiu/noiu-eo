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
            'picture' => $this->faker->randomElement([
                'packages/meeting1.jpg',
                'packages/meeting2.jpg',
                'packages/meeting3.jpg',
                'packages/meeting4.jpg',
                'packages/meeting5.jpg',
                'packages/meeting6.jpg',
                'packages/offroad1.jpg',
                'packages/offroad2.jpg',
                'packages/offroad3.jpg',
                'packages/offroad4.jpg',
                'packages/other.jpg',
                'packages/outbound1.jpg',
                'packages/outbound2.jpg',
                'packages/outbound3.jpg',
                'packages/outbound4.jpg',
                'packages/rafting1.jpg',
                'packages/rafting2.jpg',
                'packages/rafting3.jpg',
                'packages/rafting4.jpg',
                'packages/rafting5.jpg',
                'packages/sumedang.jpg',
            ]),
            'name' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(125000, 1250000),
            'desc' => $this->faker->sentence(20),
            'package_type_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
