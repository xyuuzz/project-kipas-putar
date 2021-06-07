<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class GetAllCategoriesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return response()->json(["content" => Category::get("category", "slug")]);
    }
}
