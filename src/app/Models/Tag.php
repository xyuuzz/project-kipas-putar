<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    protected $fillable = ["article_id", "tag_id"];
    // use HasFactory;
    public function articles() {
        return $this->belongsToMany(Article::class);
    }
}
