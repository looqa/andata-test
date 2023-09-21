<?php

namespace App;

use App\controllers\CommentsController;
use App\controllers\PagesController;
use App\models\Article;
use InvalidArgumentException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Router
{
    private \Buki\Router\Router $router;

    public function __construct()
    {
        $this->router = new \Buki\Router\Router;
    }

    public function dispatch()
    {

        $this->router->get('/', function (Request $request) {
            if (!Article::byId(1)) {
                return "Необходимо заполнить базу тестовыми данными. Для этого перейдите на localhost:8080/seed";
            }
            return (new PagesController($request))->home();
        });
        $this->router->get('/seed', function () {
            return Seed::start();
        });
        $this->router->group('api', function ($router) {
            $router->post('/articles/:id/comments', function ($id, Request $request, Response $response) {
                try {
                    return (new CommentsController($request))->addComment($id);
                } catch (InvalidArgumentException $e) {
                    $response->setStatusCode(Response::HTTP_BAD_REQUEST);
                    $response->setContent(json_encode([
                        "error" => $e->getMessage()
                    ]));
                    return $response;
                }
            });
        });
        $this->router->run();
    }
}