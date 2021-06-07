<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = collect([
            [
                "name" => "maulana yusuf",
                "username" => "mauyu",
                "slug" => \Str::slug("maulana yusuf"),
                "email" => "maulanayuusuf023@gmail.com",
                "password" => Hash::make("password")
            ], [
                "name" => "andi taulani",
                "username" => "annli",
                "slug" => \Str::slug("andi taulani"),
                "email" => "mamamkawann@gmail.com",
                "password" => Hash::make("password2")
            ], [
                "name" => "akbar paul galih",
                "username" => "pagabar",
                "slug" => \Str::slug("akbar paul galih"),
                "email" => "pagarmenjulangtinggi@gmail.com",
                "password" => Hash::make("password3")
            ]
        ]);

        $users->each(function($user) {
            User::create($user);
        });

    }
}
