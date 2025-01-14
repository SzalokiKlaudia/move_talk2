<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserMovie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserMovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userMovies = [
            [
                'user_id' => 1,
                'movie_id' => 1,
                'rating' => 5,
                'insert_date' => now(),
            ],
            [
                'user_id' => 1,
                'movie_id' => 2,
                'rating' => 5,
                'insert_date' => now(),
            ],
            [
                'user_id' => 2,
                'movie_id' => 1,
                'rating' => 3,
                'insert_date' => now(),
            ],
            [
                'user_id' => 2,
                'movie_id' => 2,
                'rating' => 2,
                'insert_date' => now(),
            ],
            [
                'user_id' => 2,
                'movie_id' => 3,
                'rating' => 5,
                'insert_date' => now(),
            ],
            [
                'user_id' => 3,
                'movie_id' => 1,
                'rating' => 4,
                'insert_date' => now(),
            ],
            [
                'user_id' => 3,
                'movie_id' => 2,
                'rating' => 4,
                'insert_date' => now(),
            ],
            [
                'user_id' => 3,
                'movie_id' => 3,
                'rating' => 5,
                'insert_date' => now(),
            ]
        ];

        foreach ($userMovies as $userMovie) {
            UserMovie::create($userMovie);
        }
    }
}
