<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Profile};
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\ProfileResource;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:api");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // * Mengambil profile milik user
        $profile = $user->profile;
        return response()->json(["content" => new ProfileResource($profile)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileRequest $request, User $user)
    {
        $request->validate();

        $user->update([
            "name" => $request?->name,
            "email" => $request?->email,
            "username" => $request?->username,
            "password" => bcrypt($request?->password)
        ]);
        $user->profile()->update([
            "status" => $request?->status,
            "photo_profile" => $request?->photo_profile ?? $user->profile->photo_profile,
            "hobi" => $request?->hobi,
        ]);

        return response()->json(["content" => new ProfileResource($user->profile)], 200);
    }

}
