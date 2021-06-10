<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    // use HasFactory;
    protected $fillable = ["photo_profile", "status", "slug"];


    // Relasi dengan table User
    public function user() {
        return $this->belongsTo(User::class);
    }
}
