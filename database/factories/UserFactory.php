<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'avatar' => $this->faker->randomElement([
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
      'name' => $this->faker->name(),
      'email' => $this->faker->unique()->safeEmail(),
      'phone' => $this->faker->phoneNumber(),
      'role' => $this->faker->randomElement(['User', 'Admin']),
      'address' => $this->faker->address(),
      'email_verified_at' => now(),
      'password' => Hash::make('dummyaccount'),
      // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
      'remember_token' => Str::random(10),
    ];
  }

  /**
   * Indicate that the model's email address should be unverified.
   */
  public function unverified(): static
  {
    return $this->state(fn (array $attributes) => [
      'email_verified_at' => null,
    ]);
  }
}
