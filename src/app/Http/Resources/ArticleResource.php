<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if(is_array($request))
        {
            $articles = [];
            foreach ($request as $article) {
                array_push($articles, [
                    "slug" => $article->slug,
                    "category" => $article->category()->get(["category", "slug"]),
                    "title" => $article->title,
                    "thumbnail" => $article->thumbnail,
                    "description" => \Str::limit($article->description, 150, '...'),
                    "date_release" => $article->created_at
                ]);
            }
        } else {
            $articles = [
                "slug" => $request->slug,
                "category" => $request->category()->get(["category", "slug"]),
                "title" => $request->title,
                "thumbnail" => $request->thumbnail,
                "description" => $request->description,
                "date_release" => $request->created_at,
                "tags" => $request->tags()->get(["tag", "slug"])
            ];
        }

        return $articles;
    }
}
