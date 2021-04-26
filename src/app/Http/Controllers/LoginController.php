<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            "username" => "required",
            "password" => "required"
        ]);

        // Jika client yang mencoba login tidak ada data nya di database, maka berikan response 401
        if(!$token = Auth::attempt($request->only("username", "password"))) {
            return response(null, 401);
        }

        return response()->json(compact('token'));
    }
}
