<?php
require('vendor/autoload.php');

use Trulyao\PhpRouter;

$router = new PhpRouter\Router(__DIR__ . "/src", "");

$router->get("/", function ($req, $res) {
    return $res->use("views/welcome.php");
});

$router->get("/about", function ($req, $res) {
    return $res->use("views/about.php");
});


$router->get("/handler", function ($req, $res) {
    include("src/controllers/post.php");
    return hello($req, $res);
});

$router->get("/:name", function ($req, $res) {
    return $res->send("<h1 style='font-family: Arial; text-align: center; font-size: 5rem; margin: 10vh 0;'>Hello <span style='color: #39e; text-decoration: underline;'>{$req->params("name")}</span></h1>")->status(200);
});


$router->serve();
