<?php

namespace App\DTO;

use App\models\Comment;
use InvalidArgumentException;

/**
 * @property int|null $id,
 * @property int|
 */
class CommentData extends Data
{
    public function __construct(
        public ?int    $id,
        public ?int    $article_id,
        public string  $user_name,
        public string  $user_email,
        public string  $title,
        public string  $body,
        public ?string $created_at
    )
    {
    }


    public static function fromModel(Comment $comment): static
    {
        return new self(
            $comment->id,
            $comment->article_id,
            $comment->user_name,
            $comment->user_email,
            $comment->title,
            $comment->body,
            $comment->created_at
        );
    }

    public static function collection(array $comments): array
    {
        $output = [];
        foreach ($comments as $comment) {
            $output[] = self::fromModel($comment);
        }
        return $output;
    }

    public static function validate(array $data): ?InvalidArgumentException
    {
        if (empty($data['user_name']) || empty($data['user_email']) || empty($data['title']) || empty($data['body'])) {
            return new InvalidArgumentException("Заполнены не все поля.");
        }
        if (!filter_var($data['user_email'], FILTER_VALIDATE_EMAIL)) {
            return new InvalidArgumentException("E-mail некорректен.");
        }
        return null;
    }
}