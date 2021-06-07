<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Article, Category, Tag};

class GetAllController extends Controller
{
    public function articles()
    {

        return response()->json(["content" => $this->loopArticle(Article::latest())]);
    }

    public function categories()
    {
        return response()->json(["content" => Category::get("category", "slug")]);
    }

    public function tags()
    {
        return response()->json(["content" => Tag::get("tag", "slug")]);
    }

    public function articles_by_category(Category $category)
    {
        return response()->json(["content" => $this->loopArticle($category->article->latest())]);
    }

    public function articles_by_tag(Tag $tag)
    {
        return response()->json(["content" => $this->loopArticle($tag->articles()->latest())]);
    }


    // * Method di bawah menerima array article dan mengembalikan dengan format yang sudah diatur sedemikian rupa
    protected function loopArticle(array $temp)
    {
        $articles = [];
        foreach ($temp as $article) {
            array_push($articles, [
                "slug" => $article->slug,
                "category" => $article->category,
                "title" => $article->title,
                "thumbnail" => $article->thumbnail,
                "description" => \Str::limit($article->description, 150, '...'),
                "date_release" => $article->created_at
            ]);
        }
        return $articles;
    }
}
