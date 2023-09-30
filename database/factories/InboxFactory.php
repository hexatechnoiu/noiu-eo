<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Inbox>
 */
class InboxFactory extends Factory
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
      'email' => $this->faker->unique()->safeEmail(),
      'status' => $this->faker->randomElement(['read', 'unread']),
      'message' => $this->faker->sentence(mt_rand(20, 50)),
    ];
  }
}
