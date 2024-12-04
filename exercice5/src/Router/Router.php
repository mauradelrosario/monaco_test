<?php
namespace Router;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Config\Database;
use Controller\CinemaController;

$app->get('/cinemas', function (Request $request, Response $response) {
    $db = new Database();
    $controller = new CinemaController($db);
    $cinemas = $controller->getCinemas();

    $response->getBody()->write(json_encode($cinemas));
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);
});