<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class GetAllArticleController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $articles = [];
        foreach(Article::get() as $article)
        {
            array_push($article, [
                "slug" => $article->slug,
                "category" => $article->category,
                "title" => $article->title,
                "thumbnail" => $article->thumbnail,
                "description" => \Str::limit($article->description, 150, '...'),
                "date_release" => $article->created_at
            ]);
        }

        return response()->json(["content" => $articles]);
    }
}

array_push($article, [
    "slug" => $article->slug,
    "category" => $article->category,
    "title" => $article->title,
    "thumbnail" => $article->thumbnail,
    "description" => $article->description,
    "author" => $article->user,
    "date_release" => $article->create_at
]);
