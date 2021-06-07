<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $profiles = collect([
            [
                "user_id" => 1,
                "photo_profile" => "default.png",
                "status" => "admin"
            ], [
                "user_id" => 2,
                "photo_profile" => "default.png",
                "status" => "Pelajar"
            ], [
                "user_id" => 3,
                "photo_profile" => "default.png",
                "status" => "Mahasiswa"
            ]
        ]);

        $profiles->each(function($user) {
            Profile::create($user);
        });
    }
}
