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
                "foto_profil" => "default.png",
            ], [
                "user_id" => 2,
                "foto_profil" => "gantengbet.png",
                "status" => "Pelajar"
            ], [
                "user_id" => 3,
                "foto_profil" => "default.png",
                "status" => "Mahasiswa"
            ]
        ]);

        $profiles->each(function($user) {
            Profile::create($user);
        });
    }
}
