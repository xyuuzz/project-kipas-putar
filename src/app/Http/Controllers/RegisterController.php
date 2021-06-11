<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        $user = User::create([
            "name" => $request->name,
            "username" => $request->username,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "slug" => uniqid() . $request->username,
        ]);

        $user->profile()->create([
            "photo_profile" => "default.png",
            "status" => $request->status
        ]);

        $token = Auth::attempt($request->only("username", "password"));
        $slug = $user->slug;
        return response()->json(compact("token", "slug"));
    }
}
