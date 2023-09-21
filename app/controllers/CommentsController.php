<?php

namespace App\controllers;

use App\DTO\CommentData;
use App\models\Article;
use App\models\Comment;
use InvalidArgumentException;

class CommentsController extends Controller
{
    public function addComment(int $article_id): string
    {
        $fields = $this->request->toArray();
        if ($ex = CommentData::validate($fields))
            throw $ex;
        $article = Article::byId($article_id);
        if (!$article)
            throw new InvalidArgumentException('Статья не найдена.');
        $fields["article_id"] = $article->id;
        $comment = Comment::create($fields);
        return CommentData::fromModel($comment)->toJson();
    }
}