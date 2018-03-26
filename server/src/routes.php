<?php

use App\Pages\Model;
use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/api/v1/pages', function (Request $request, Response $response, array $args) {
    return $response->withJson(Model::all());
});

$app->post('/api/v1/pages', function (Request $request, Response $response, array $args) {
    $data = [
        'title' => filter_input(INPUT_POST, 'title'),
        'body'  => filter_input(INPUT_POST, 'body'),
        'slug'  => filter_input(INPUT_POST, 'slug')
    ];

    return $response->withJson(Model::create($data), 201);
});
