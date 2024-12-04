<?php

use DI\Bridge\Slim\Bridge;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\Database;

require __DIR__ . '/../vendor/autoload.php';

$app = Bridge::create();

// Add error middleware
$app->addErrorMiddleware(true, true, true);

// Add routes
require __DIR__ . '/../src/routes.php';

$app->run();

