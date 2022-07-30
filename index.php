<?php
require('vendor/autoload.php');

use Trulyao\PhpRouter;

$router = new PhpRouter\Router(__DIR__ . "/src", "");

$router->get("", function ($req, $res) {
    return $res->use("views/welcome.php");
});

$router->get("/about", function ($req, $res) {
    return $res->use("views/about.php");
});


$router->get("/handler", function ($req, $res) {
    include("src/controllers/post.php");
    return hello($req, $res);
});

$router->get(":name", function ($req, $res) {
    return $res->send("<h1>Hello {$req->params("name")}</h1>")->status(200);
});


$router->serve();
