<?php

namespace App\models;

class Article extends Model
{
    protected static string $table = 'articles';

    public int $id;
    public string $created_at;
    public string $title;
    public string $body;

    /**
     * @return Comment[]
     */
    public function comments(): array
    {
        return Comment::find("article_id", "=", $this->id);
    }
}