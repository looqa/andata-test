<?php

namespace App\controllers;

use App\DTO\ArticleData;
use App\models\Article;

class PagesController extends Controller
{
    public function home(): string
    {
        $article = Article::byId(1);
        $articleData = ArticleData::fromModel($article);
        return $this->render('home', ['articleData' => $articleData, 'title' => $articleData->title]);
    }
}