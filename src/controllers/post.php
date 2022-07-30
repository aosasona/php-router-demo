<?php


function hello($req, $res)
{
    return $res->send(["message" => "Hello World from controller!", "success" => true])->status(200);
}
