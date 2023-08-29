<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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
            // 'name' => fake()->name(),
            // 'username' => fake()->unique()->userName(),
            // 'avatar' => 'https://i.pravatar.cc/150?u='. $this->faker->randomNumber(1,100),
            // 'email' => fake()->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => fake()->password(),
            // 'remember_token' => Str::random(10),

            'name' => $this->faker->name(),
            'email' => $this->faker->email(),
            'username' => $this->faker->userName(),
            'email_verified_at' => now(),
            'password' => $this->faker->password(8,20),
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