<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class GetAllArticleByCategory extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $articles = [];
        // Article::where("category_id", Category::firstWhere("category", $request)->category)->latest()
        foreach(Category::firstWhere("slug", $request)->article as $article )
        {
            array_push($articles, [
                "slug" => $article->slug,
                "title" => $article->title,
                "thumbnail" => $article->thumbnail,
                "description" => \Str::limit($article->description, 150, '...'),
                "date_release" => $article->created_at,
                "author" => $article->user->name
            ]);
        }

        return response()->json(["content" => $articles]);
    }
}
