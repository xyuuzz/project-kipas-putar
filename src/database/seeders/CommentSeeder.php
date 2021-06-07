<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comments = collect([
            [
                "article_id" => 1,
                "user_id" => 2,
                "comment" => "wah, bagus sekali article nya kakk"
            ], [
                "article_id" => 2,
                "user_id" => 3,
                "comment" => "bagian front end nya dirapiin lagi ya kakk:>"
            ], [
                "article_id" => 2,
                "user_id" => 2,
                "comment" => "wahh, article nya kurang menarik yang ini kak, saran saya direvisi aja"
            ]
        ]);

        $comments->each(function($comment) {
            Comment::create($comment);
        });
    }
}
