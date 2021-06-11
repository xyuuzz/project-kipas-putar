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
        return response()->json(["content" => $this->resourceArticleArray(Article::latest()->get())]);
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
            "category_id" => $request->category,
            "title" => $request->title,
            "slug" => \Str::slug($request->title),
            "thumbnail" => $request->thumbnail,
            "description" => $request->description,
        ]);

        $article->tags()->attach($request->tags);

        return response()->json(["status" => "success", "content" => $this->resourceArticleArray(Article::latest()->get())]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return response()->json(["content" => $this->resourceArticleModel($article)]);
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
            "category_id" => $request->category,
            "title" => $request->title,
            "slug" => \Str::slug($request->title),
            "thumbnail" => $request->thumbnail,
            "description" => $request->description,
        ]);

        $article->tags()->attach($request->tags);

        return response()->json(["status" => "success", "content" => $this->resourceArticleModel($article) ]);
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

        return response()->json(["status" => "success", "content" => $this->resourceArticleArray(Article::latest()->get())]);
    }


    public function articles_by_category(Category $category)
    {
        return response()->json(["content" => $this->resourceArticleArray($category->article()->latest()->get())]);
    }

    public function articles_by_tag(Tag $tag)
    {
        return response()->json(["content" => $this->resourceArticleArray($tag->articles()->latest()->get())]);
    }

    protected function resourceArticleArray($data)
    {
        $articles = [];
        foreach ($data as $article) {
            array_push($articles, [
                "slug" => $article->slug,
                "category" => $article->category()->get(["category", "slug"]),
                "title" => $article->title,
                "thumbnail" => $article->thumbnail,
                "description" => \Str::limit($article->description, 150, '...'),
                "date_release" => $article->created_at
            ]);
        }
        return $articles;
    }

    protected function resourceArticleModel($data)
    {
        return [
            "slug" => $data->slug,
            "category" => $data->category()->get(["category", "slug"]),
            "title" => $data->title,
            "thumbnail" => $data->thumbnail,
            "description" => \Str::limit($data->description, 150, '...'),
            "date_release" => $data->created_at,
            "tags" => $data->tags()->get(["tag", "slug"])
        ];
    }

}
