<?php

namespace App\models;

use App\DTO\CommentData;

class Comment extends Model
{
    protected static string $table = 'comments';

    public int $id;
    public int $article_id;
    public string $user_name;
    public string $user_email;
    public string $title;
    public string $body;
    public string $created_at;
}