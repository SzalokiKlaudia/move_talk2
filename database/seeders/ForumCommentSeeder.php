<?php

namespace Database\Seeders;

use App\Models\ForumComment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ForumCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $forumComments = [
            [
                'forum_topic_id' => 1,
                'user_id' => 1,
                'comment' => "Sziasztok ez itt az off topic!",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'forum_topic_id' => 2,
                'user_id' => 1,
                'comment' => "Sziasztok horror kedvelők!",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'forum_topic_id' => 2,
                'user_id' => 2,
                'comment' => "Szervusz kedves admin! :)",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        foreach ($forumComments as $forumComment) {
            ForumComment::create($forumComment);
        }
    }
}
