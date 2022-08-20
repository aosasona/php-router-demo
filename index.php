<?php
require('vendor/autoload.php');

use Trulyao\PhpRouter\Router as Router;
use Trulyao\PhpRouter\HTTP\Response as Response;
use Trulyao\PhpRouter\HTTP\Request as Request;

$router = new Router(__DIR__ . "/src", "");

$router->get("/", function (Request $req, Response $res) {
    return $res->render("views/welcome.php");
});

$router->get("/about", function (Request $req, Response $res) {
    return $res->render("views/about.php");
});


$router->get("/handler", function (Request $req, Response $res) {
    include("src/controllers/post.php"); // this is a controller file
    return hello($req, $res);
});

$router->get("/:name", function (Request $req, Response $res) {
    return $res->send("<h1 style='font-family: Arial; text-align: center; font-size: 5rem; margin: 10vh 0;'>Hello <span style='color: #39e; text-decoration: underline;'>{$req->params("name")}</span></h1>")->status(200);
});


$router->serve();
