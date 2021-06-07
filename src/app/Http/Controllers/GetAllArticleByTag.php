<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class GetAllArticleByTag extends Controller
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
        foreach (Tag::firstWhere("slug", $request)->article as $article) {
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
