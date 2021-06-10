<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(["content" => Category::get(["category", "slug"])]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if(count(Category::where("category", $request->category)->get())) {
        //     return response()->json(["status" => false, "message" => "Category "]);
        // }

        $request->validate([
            "category" => "required|string|min:4|unique:categories"
        ]);

        Category::create([
            'category' => $request->category,
            'slug' => \Str::slug($request->category)
        ]);

        return response()->json( ["status" => true,"content" => Category::get(["category", "slug"])] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // cek apakah category punya article
        // loop article
        // hapus realasi tag yang dimiliki setiap article yang di loop
        // lalu hapus article
        // hapus category
        if($category->article()->count()) {
            if($category->article->tags()->count()) {
                $category->article()->tags()->detach();
            }
            $category->article()->delete();
        }

        $category->delete();
        return response()->json( ["status" => true,"content" => Category::get(["category", "slug"])] );
    }
}
