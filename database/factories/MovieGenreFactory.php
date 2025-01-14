<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MovieGenre>
 */
class MovieGenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

           'movie_id' => $this->faker->numberBetween(1, 100),
            'genre_id' => $this->faker->numberBetween(1, 100),
              
        
        ];
    }
}
