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
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_name' => fake('hu_HU')->userName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'name' => fake('hu_HU')->name(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'birth_year'=> $this->faker->year($max = 'now'),
            'role'=> $this->faker->numberBetween(0, 2),
            'is_deleted'=>fake()->boolean(),
            'deleted'=>fake()->dateTime(),
            'password' => static::$password ??= Hash::make('password'),
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
