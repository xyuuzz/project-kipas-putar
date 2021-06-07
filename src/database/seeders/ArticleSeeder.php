<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $articles = collect(
            [
                [
                    "user_id" => 1,
                    "category_id" => 1,
                    "title" => "Javascript Console Log",
                    "slug" => \Str::slug("Javascript Console Log"),
                    "thumbnail" => "default.png",
                    "description" => "console log adalah sebuah fitur pada browser yang memngkinkan kita untuk bla bla bla"
                ], [
                    "user_id" => 1,
                    "category_id" => 2,
                    "title" => "Javascript Sangat Powerfull",
                    "slug" => \Str::slug("Javascript Sangat Powerfull"),
                    "thumbnail" => "jsjs.png",
                    "description" => "Javascrpt adalah bahasa yang powefull, kenapa sih? yaa karena javascript dapat dipakai di berbagai lini."
                ]
            ]
        );

        $articles->each(function($article) {
            Article::create($article);
        });

    }
}
