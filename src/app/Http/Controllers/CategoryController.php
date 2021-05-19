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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(count(Category::where("category", $request->category)->get())) {
            return response()->json(["status" => false], 200);
        }

        $request->validate([
            "category" => "required|string"
        ]);

        Category::create([
            'category' => $request->category,
            'slug' => \Str::slug($request->category)
        ]);


        return response()->json(['status' => true], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $data = $category->articles()->get();
        return response()->json([compact("data"), "status" => true], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(count($category->articles()->get())) {
            $category->articles()->first()->comments()->delete();

            $category->articles()->delete();
        }

        $category->delete();

        return response()->json(['status' => true], 200);
    }
}
