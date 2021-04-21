<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    // use HasFactory;
    protected $fillable = ["slug", "foto", "description"];

    // Relasi dengan table categorey
    public function category() { // satu article dapat memiliki banyak category
        return $this->belongsto(Category::class);
    }

    // Relasi dengan table komen
    public function comments() { // satu artikel dapat memiliki banyak kommen
        return $this->hasMany(Comment::class);
    }
}
