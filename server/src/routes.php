<?php

use App\Pages\Model;
use Slim\Http\Request;
use Slim\Http\Response;

// Routes

$app->get('/api/v1/pages', function (Request $request, Response $response, array $args) {
    return $response->withJson($this->pages_domain->all());
});

$app->post('/api/v1/pages', function (Request $request, Response $response, array $args) {
    return $response->withJson($this->pages_domain->create(), 201);
});
