<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'title' => "Jumanji",
                'description' => "Jumanji leírása",
                'release_date' => "1998-01-25",
                'duration_minutes' => 196,
                'image_url' => "https://jumanji.com/image.png",
                'trailer_url' => "https://jumanji.com/trailer.png",
                'cast_url' => "https://jumanji.com/cast.png"
            ],
            [
                'title' => "Eredet",
                'description' => "Eredet film leírása",
                'release_date' => "2010-03-05",
                'duration_minutes' => 220,
                'image_url' => "https://eredet.com/image.png",
                'trailer_url' => "https://eredet.com/trailer.png",
                'cast_url' => "https://eredet.com/cast.png"
            ],
            [
                'title' => "Drakula",
                'description' => "Drakula film leírása",
                'release_date' => "1995-01-05",
                'duration_minutes' => 180,
                'image_url' => "https://drakula.com/image.png",
                'trailer_url' => "https://drakula.com/trailer.png",
                'cast_url' => "https://drakula.com/cast.png"
            ]
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
