<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Benefits>
 */
class BenefitsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'desc' => fake()->paragraph(2),
            'icon' =>fake()->randomElement(['fa-solid fa-thumbs-up fa-lg', 'fa-solid fa-puzzle-piece fa-lg', 'fa-solid fa-award fa-lg', 'fa-solid fa-receipt fa-lg', 'fa-solid fa-lock fa-lg'])
        ];
    }
}
