<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoryController, ArticleController, RegisterController, LoginController, LogoutController, GetAllController, ProfileController, TagController};
// use App\Http\Controllers\{RegisterController, LoginController, LogoutController, ProfileController, ArticleController, CategoryController, CommentController, ArticleIndexController, GetAllArticleController, TagController, GetAllCategoriesController, GetAllController};

Route::post("login", LoginController::class)->name("login");
Route::post("register", RegisterController::class)->name("register");
Route::get("logout", LogoutController::class)->middleware("auth:api")->name("logout");


// ------------------------------------------------------------------------------ //

Route::get("profiles/{user:slug}", [ProfileController::class, "show"])->name("profile.show");
Route::patch("profiles/{user:slug}", [ProfileController::class, "update"])->name("profile.update");

Route::get("articles/category/{category:slug}", [ArticleController::class, "articles_by_category"])->name("articles.by.category");
Route::get("articles/tag/{tag:slug}", [ArticleController::class, "articles_by_tag"])->name("articles.by.tag");
Route::resource("articles", ArticleController::class)
    ->except(["edit"])
    ->scoped(["article" => "slug"]);

Route::resource("tags", TagController::class)
    ->only(["store", "destroy", "index"])
    ->scoped(["tag" => "slug"]);

Route::resource("categories", CategoryController::class)
    ->only(["store", "destroy", "index"])
    ->scoped(["category" => "slug"]);


// Route Article
// Route::get("article/all", [ArticleIndexController::class, "index"]);
// Route Show Article
// Route::get("article/{article:slug}", [ArticleIndexController::class, "show"]);

// Route Komentar
// Route::get("article/comment/all/{article:slug}", [CommentController::class, "show"]);


// Route Category
// Route::get("article/category/{category:slug}", [CategoryController::class, "show"]);

// Route Tag
// Route::get("article/tag/{tag:slug}", [TagController::class, "show"]);


// Route::middleware('auth:api')->group(function ()
// {
//     // Untuk Logout
//     Route::get("logout", LogoutController::class);


//     // -------------------- PROFILE ---------------------- //

//     // ke halaman profile user
//     Route::get("profile/user/{user:slug}", [ProfileController::class, "show"]);
//     // update profile user
//     Route::patch("profile/user/{user:slug}", [ProfileController::class, "update"]);


//     // ------------------------- Article ------------------- //
//     Route::prefix("admin")->group(function()
//     {
//         // untuk membuat Article
//         Route::post("create/article", [ArticleController::class, "store"]);
//         // untuk menghapus article
//         Route::delete("delete/article/{article:slug}", [ArticleController::class, "destroy"]);
//         // untuk mengupdate article
//         Route::patch("update/article/{article:slug}", [ArticleController::class, "update"]);


//         // Category
//         // untuk membuat Category
//         Route::post("create/category", [CategoryController::class, "store"]);
//         // untuk menghapus Category
//         Route::delete("delete/category/{category:slug}", [CategoryController::class, "destroy"]);
//         // untuk mengupdate Category
//         // Route::patch("update/category/{category:slug}", [CategoryController::class, "update"]);
//     });


//     // ------------------- Comments ---------------------

//     // masukan komen ke database
//     Route::post("create/comment", [CommentController::class, "store"]);
//     // untuk delete komen
//     Route::delete("delete/comment/{comment:id}", [CommentController::class, "destroy"]);
//     // untuk update komen
//     Route::patch("update/comment/{comment:id}", [CommentController::class, "update"]);

// });
