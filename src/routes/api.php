<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategoryController, ArticleController, RegisterController, LoginController, LogoutController, GetAllController, ProfileController, TagController};


Route::get("/", function() {
    return response()->json([
        "login : post" => "/api/login",
        "register : post" => "/api/resgiter",
        "logout : post" => "/api/logout",
        "Show Profile : get" => "/api/profiles/{user:slug}",
        "Update Profile : patch" => "/api/profiles/{user:slug}",
        "All Article : get" => "/api/articles",
        "Show Article : get" => "/api/articles/{article:slug}",
        "Create Article : post" => "/api/articles",
        "Update Article : patch" => "/api/articles/{article:slug}",
        "Delete Article : delete" => "/api/articles/{article:slug}",
        "Get Article By Category: get" => "/api/articles/category/{category:slug}",
        "Get Article By Tag: get" => "/api/articles/tag/{tag:slug}",
        "All Tags: get" => "/api/tags",
        "All Categories: get" => "/api/categories",
        "Create Tag: post" => "/api/tags",
        "Delete Tag: delete" => "api/tags/{tag:slug}",
        "Create Category: post" => "/api/categories",
        "Delete Category: delete" => "api/categories/{category:slug}",
    ]);
});

Route::post("login", LoginController::class)->name("login");
Route::post("register", RegisterController::class)->name("register");
Route::get("logout", LogoutController::class)->middleware("auth:api")->name("logout");

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
