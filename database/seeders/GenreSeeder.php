<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            [
                'name' => 'Kaland',
            ],
            [
                'name' => 'Thriller',
            ],
            [
                'name' => 'Horror',
            ]
        ];

        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}
