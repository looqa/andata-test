<?php

namespace App\controllers;

use Jenssegers\Blade\Blade;
use Symfony\Component\HttpFoundation\Request;

abstract class Controller
{

    protected Blade $blade;
    protected Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->blade = new Blade(__DIR__ . '/../views', __DIR__ . '/../cache');
        $this->blade->directive('assets', function ($expression) {
            $manifest = json_decode(file_get_contents(__DIR__ . '/../../public/manifest.json'), JSON_FORCE_OBJECT);
            $section = $manifest[$expression];
            $jsPath = $section['file'];
            $out = "<script src=\"$jsPath\"></script>";
            foreach ($section['css'] as $cssPath) {
                $out .= "<link rel=\"stylesheet\" href=\"$cssPath\">";
            }
            return $out;
        });
    }

    protected function render(string $view, array $data = []): string
    {
        return $this->blade->make($view, $data)->render();
    }
}