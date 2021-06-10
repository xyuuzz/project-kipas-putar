<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ArticleResource;
use App\Models\{Article, Category, Tag};

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(["content" => new ArticleResource(Article::latest()->get())]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required",
            "thumbnail" => "required|string",
            "description" => "required|string",
            "tags" => "required",
            "category" => "required"
        ]);

        $article = Auth::user()->article()->create([
            "category_id" => Category::firstWhere("category", $request->category)->id,
            "title" => $request->title,
            "slug" => \Str::slug($request->title),
            "thumbnail" => $request->thumbnail,
            "description" => $request->description,
        ]);

        $article->tags()->attach($request->tags);

        return response()->json(["status" => "success", "content" => null ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return response()->json(["content" => new ArticleResource($article)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $request->validate([
            "title" => "required",
            "thumbnail" => "required|string",
            "description" => "required|string",
            "tags" => "required",
            "category" => "required"
        ]);

        $article->update([
            "category_id" => Category::firstWhere("category", $request->category)->id,
            "title" => $request->title,
            "slug" => \Str::slug($request->title),
            "thumbnail" => $request->thumbnail,
            "description" => $request->description,
        ]);

        $article->tags()->attach($request->tags);

        return response()->json(["status" => "success", "content" => null ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->tags()->detach();
        $article->delete();

        return response()->json(["status" => "success", "content" => null ]);
    }


    public function articles_by_category(Category $category)
    {
        return response()->json(["content" => new ArticleResource($category->article()->latest()->get())]);
    }

    public function articles_by_tag(Tag $tag)
    {
        return response()->json(["content" => new ArticleResource($tag->articles()->latest()->get())]);
    }
}
