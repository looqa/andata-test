<?php

namespace App;

use App\models\Article;
use App\models\Comment;

class Seed
{
    public static function start()
    {
        if (Article::byId(1)) {
            return "Тестовые данные уже были загружены";
        }
        $article = Article::create([
            "title" => "Lorem ipsum dolor sit amet.",
            "body" => "<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><br/><p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>"
        ]);
        $comments = [
            [
                "article_id" => $article->id,
                "user_name" => "Test",
                "user_email" => "test@mail.test",
                "title" => "Comment 1",
                "body" => "Comment body"
            ],
            [
                "article_id" => $article->id,
                "user_name" => "Test",
                "user_email" => "test@mail.test",
                "title" => "Comment 2",
                "body" => "Comment body 2"
            ],
        ];
        foreach ($comments as $comment) {
            Comment::create($comment);
        }
        return "Заполнение тестовыми данными завершено.";
    }
}