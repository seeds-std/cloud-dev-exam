<?php
declare(strict_types=1);

use App\Application\Actions\UsersAction;
use App\Application\Actions\ExamsAction;
use App\Application\Actions\ScoresAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->get('/users', UsersAction::class);
    $app->get('/exams', ExamsAction::class);
    $app->get('/scores', ScoresAction::class);
};
