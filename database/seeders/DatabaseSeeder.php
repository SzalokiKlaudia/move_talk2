<?php

namespace Database\Seeders;

use App\Models\Genre;
use App\Models\MovieGenre;
use App\Models\MovieKeyword;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(MovieSeeder::class);
        $this->call(GenreSeeder::class);
        $this->call(MovieGenreSeeder::class);
        $this->call(KeywordSeeder::class);
        $this->call(MovieKeywordSeeder::class);
        $this->call(UserMovieSeeder::class);
        $this->call(ForumTopicSeeder::class);
        $this->call(ForumCommentSeeder::class);

        /*
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
    }
}
