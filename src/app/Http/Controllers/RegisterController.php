<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Models\Profile;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(UserRequest $request)
    {
        sUser::create([
            "name" => $request->name,
            "username" => $request->username,
            "email" => $request->email,
            "password" => bcrypt($request->password)
        ]);

        Profile::create([
            "foto_profil" => "default.png",
            "slug" => \Str::slug($user->name),
            "user_id" => $user->id
        ]);

        return response()->json("Berhasil Mendaftar");
    }
}
