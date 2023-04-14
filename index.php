<?php

define("BASE_URL", "http://localhost:8000");

require_once __DIR__ . '/Router.php';
$requestUri = $_SERVER['REQUEST_URI'];

//var_dump($requestUri);

$router = new Router;
$router->getPath($requestUri);

include('src/pages/template/footer.php');
