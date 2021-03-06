<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\{Tag, Comment, Category, User};
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    // use HasFactory;
    protected $fillable = ["user_id", "category_id", "slug", "thumbnail", "description", "title"];

    // Relasi dengan table categorey
    public function category() { // satu article dapat memiliki banyak category
        return $this->belongsto(Category::class);
    }

    // Relasi dengan table komen
    public function comments() { // satu artikel dapat memiliki banyak kommen
        return $this->hasMany(Comment::class);
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function user() {
        return $this->belongsto(User::class);
    }
}
