<?php

namespace Database\Seeders;

use App\Models\MovieKeyword;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movieKeywords = [
            [
                'movie_id' => 1,
                'keyword_id' => 1,
            ],
            [
                'movie_id' => 1,
                'keyword_id' => 2,
            ],
            [
                'movie_id' => 2,
                'keyword_id' => 3,
            ],
            [
                'movie_id' => 2,
                'keyword_id' => 4,
            ],
            [
                'movie_id' => 3,
                'keyword_id' => 5,
            ],
            [
                'movie_id' => 3,
                'keyword_id' => 6,
            ]
        ];

        foreach ($movieKeywords as $movieKeyword) {
            MovieKeyword::create($movieKeyword);
        }
    }
}
