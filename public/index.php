<?php
require __DIR__.'/../vendor/autoload.php';
$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

(new \App\Router())->dispatch();