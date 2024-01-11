<?php

namespace App\Containers\AppSection\Article\UI\API\Transformers;

use App\Containers\AppSection\Article\Models\Article;
use App\Ship\Parents\Transformers\Transformer as ParentTransformer;

class ArticleTransformer extends ParentTransformer
{
    protected array $defaultIncludes = [

    ];

    protected array $availableIncludes = [

    ];

    public function transform(Article $article): array
    {
        $response = [
            'object' => $article->getResourceKey(),
            'id' => $article->getHashedKey(),
            'title' => $article->title,
            'content' => $article->content,
        ];

        return $this->ifAdmin([
            'real_id' => $article->id,
            'created_at' => $article->created_at,
            'updated_at' => $article->updated_at,
            'readable_created_at' => $article->created_at->diffForHumans(),
            'readable_updated_at' => $article->updated_at->diffForHumans(),
            // 'deleted_at' => $article->deleted_at,
        ], $response);
    }
}
