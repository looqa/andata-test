<?php

namespace App\DTO;

use App\models\Article;

/**
 * @property int $id,
 * @property string $created_at,
 * @property string $title,
 * @property string $body,
 * @property CommentData[] $comments
 */
class ArticleData extends Data
{
    public function __construct(
        public int    $id,
        public string $created_at,
        public string $title,
        public string $body,
        public array  $comments
    )
    {
    }

    public static function fromModel(Article $article): self
    {
        return new self(
            $article->id,
            $article->created_at,
            $article->title,
            $article->body,
            CommentData::collection($article->comments())
        );
    }
}