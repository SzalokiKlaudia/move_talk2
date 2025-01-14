<?php

namespace Database\Seeders;

use App\Models\ForumTopic;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForumTopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $forumTopics = [
            [
                'user_id' => 1,
                'title' => 'Off topic',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'user_id' => 1,
                'title' => 'Klasszikus horrorfilmek legjobb színészei',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        foreach ($forumTopics as $forumTopic) {
            ForumTopic::create($forumTopic);
        }
    }
}
