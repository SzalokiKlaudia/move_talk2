<?php

namespace Database\Seeders;

use App\Models\MovieGenre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieGenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movieGenre = [
            [
                'movie_id' => 1,
                'genre_id' => 1
            ],
            [
                'movie_id' => 2,
                'genre_id' => 2
            ],
            [
                'movie_id' => 3,
                'genre_id' => 3
            ]
        ];

        foreach ($movieGenre as $genre) {
            MovieGenre::create($genre);
        }
    }
}
