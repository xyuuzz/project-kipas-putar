<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\User;
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
    public function show(User $user)
    {
        // Mengambil profile milik user
        $data = $user->profile;
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
    { // pada tahap production, tambahkan required pada ProfileRequest
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

}
