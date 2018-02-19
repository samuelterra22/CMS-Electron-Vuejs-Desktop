<?php

use App\Models\Pages;
use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/api/v1/pages', function (Request $request, Response $response, array $args) {
    return $response->withJson(Pages::all());
});
