<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($profile)
    {
        return [
            "slug" => $profile->user->slug,
            "name" => $profile->user->name,
            "username" => $profile->user->username,
            "email" => $profile->user->email,
            "photo_profile" => $profile->user->profile->photo_profile,
            "hobi" => $profile->user->profile->hobi,
            "status" => $profile->user->profile->status
        ];
    }
}
