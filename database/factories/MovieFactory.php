<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'=>fake()->sentence(3),
            'description'=>fake()->sentence(),
            'release_date'=>fake()->date(),
            'duration_minutes'=>$this->faker->numberBetween(1, 1000),
            'image_url'=>fake()->url(),
            'trailer_url'=>fake()->url(),
            'cast_url'=>fake()->url(),

        ];
    }
}
