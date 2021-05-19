<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = collect([
            [
                "tag" => "pengetahuan umum",
                'slug' => \Str::slug("pengetahuan umum")
            ], [
                "tag" => "alamiah",
                "slug" => \Str::slug("alamiah")
            ]
        ]);

        $tags->each(function($tag) {
            Tag::create($tag);
        });
    }
}
