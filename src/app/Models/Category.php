<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    // use HasFactory;
    protected $fillable = ["category", "slug"];

    // relasi dengan table article
    public function articles() { // satu category dapat memiliki banyak artikel
        return $this->hasMany(Article::class);
    }
}
