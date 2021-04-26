<?php

use Illuminate\Http\Request;
use App\Http\Middleware\MakeProfile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{RegisterController, LoginController, LogoutController, ProfileController, ArticleController, CategoryController, CommentController, ArticleIndexController};


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


// untuk login
Route::post("login", LoginController::class);
// Untuk register
Route::post("register", RegisterController::class);


// Route Article
Route::get("article/all", [ArticleIndexController::class, "index"]);
// Route Show Article
Route::get("article/{article:slug}", [ArticleIndexController::class, "show"]);


Route::middleware('auth:api')->group(function ()
{
    // Untuk Logout
    Route::get("logout", LogoutController::class);


    // -------------------- PROFILE ---------------------- //

    // ke halaman profile user
    Route::get("profile/user/{profile:slug}", [ProfileController::class, "show"]);
    // update profile user
    Route::patch("profile/user/{profile:slug}", [ProfileController::class, "update"]);


    // ------------------------- Article ------------------- //
    Route::prefix("admin")->middleware(Admin::class)->group(function()
    {
        // untuk membuat Article
        Route::post("create/article", [ArticleController::class, "store"]);
        // untuk menghapus article
        Route::delete("delete/article/{article:slug}", [ArticleController::class, "destroy"]);
        // untuk mengupdate article
        Route::patch("update/article/{article:slug}", [ArticleController::class, "update"]);


        // Category
        // untuk membuat Category
        Route::post("create/category", [CategoryController::class, "store"]);
        // untuk menghapus Category
        Route::delete("delete/category/{category:slug}", [CategoryController::class, "destroy"]);
        // untuk mengupdate Category
        // Route::patch("update/category/{category:slug}", [CategoryController::class, "update"]);
    });


    // ------------------- Comments ---------------------

    // masukan komen ke database
    Route::post("create/comment", [CommentController::class, "store"]);
    // untuk delete komen
    Route::delete("delete/comment/{comment:id}", [CommentController::class, "destroy"]);
    // untuk update komen
    Route::patch("update/comment/{comment:id}", [CommentController::class, "update"]);



});




