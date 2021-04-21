<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = collect(["laravel", "technologies", "IoT"]);

        $categories->each(function ($category)
        {
            Category::create([
                "category" => $category,
                "slug" => \Str::slug($category)
            ]);
        });
    }
}
