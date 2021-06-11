<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Middleware\Admin;

class TagController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(Admin::class)->except("index");
    // }

    /**
     * Return All Tags
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(["content" => Tag::get(["tag", "slug"])]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // * validate
        $request->validate([
            "tag" => "required|unique:tags"
        ]);

        Tag::create([
            "tag" => $request->tag,
            "slug" => \Str::slug($request->tag)
        ]);

        return response()->json(["status" => "success", "tags" => Tag::get(["tag", "slug"])]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->articles()->detach(); // * delete article tag contain that tag would delete
        $tag->delete();
        return response()->json(["status" => "success", "tags" => Tag::get(["tag", "slug"])]);
    }
}
