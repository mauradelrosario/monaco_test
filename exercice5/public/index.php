<?php

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Controller\CinemaController;
use Settings\Database;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write("Hello Monaco!");
    return $response;
});

$app->get('/cinemas', function (Request $request,Response $response) {
    $connexion = new Database();
    $controller = new CinemaController($connexion->getConnection());

    $cinemas = $controller->getCinemas();

    $response->getBody()->write(json_encode($cinemas));
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);
});

$app->run();

