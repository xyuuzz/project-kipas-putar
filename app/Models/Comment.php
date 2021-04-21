<?php

namespace App\Models;

use App\Models\User;
use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    // use HasFactory;
    protected $fillable = ["comment"];

    // relasi dengan table user
    public function user() { // satu user dapat memiliki banyak comment di banyak artikel
        return $this->belongsTo(User::class);
    }

    // relasi dengan table article
    public function article() { // satu article dapat memiliki banyak comment
        return $this->belongsTo(Article::class);
    }
}
