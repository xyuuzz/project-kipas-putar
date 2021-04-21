<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        $data = $profile->get();
        return response()->json(compact("data"), 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Profile $profile, ProfileRequest $request)
    {
        $data = $request->only("nama", "status");
        if( $foto = $request->file("foto_profil") )
        {
            $nama_foto = uniqid() . ".$foto->extension()";
            // Memasukan foto ke dalam storage
            $store = $foto->storeAs("public/images/profiles", $nama_foto);
            $data[] = $nama_foto;
        }

        // Masukan Data :
        $profile->update([
            "name" => $request->nama,
            "status" => $request->status,
            "foto_profil" => $nama_foto ?? "default.png"
        ]);

        // validate form milik user
        $request->validate([
            "username" => "alpha_num",
            "password" => "required|alpha_num"
        ]);

        $profile->user()->update([
            "username" => $request->username,
            "password" => bcrypt($request->password)
        ]);

        return response()->json(["result" => true], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    // To Update Profile User
//     public function update(Profile $profile, ProfileRequest $request)
//     // {
//     //     // validate untuk form yang berhubungan dengan data table user
//     //     $request->validate([
//     //         "username" => "required|alpha_num",
//     //         "password" => "required|alpha_num"
//     //     ]);

//     //     // update data profile table
//     //     $profile->update($request->only("foto_profil", "status"));

//     //     // update data user table
//     //     $profile->user->update($request->only("password", "username"));

//     //     return response()->json(["status" => true], 200);
//     // }
}
