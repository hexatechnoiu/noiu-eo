<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'date' => $this->faker->dateTime(),
            'payment_method' => $this->faker->randomElement(['Debit', 'Credit', 'GoPay', 'ShopeePay', 'Dana', 'OVO']),
            'package_id' => $this->faker->numberBetween(1, 25),
        ];
    }
}