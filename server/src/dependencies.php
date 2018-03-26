<?php
// DIC configuration

use App\Pages\Domain;
use App\Pages\Responder;
use Illuminate\Database\Capsule\Manager;

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

$container['db'] = function ($c){
    $manager = new Manager();
    $manager->addConnection($c->get('settings')['db']);
    $manager->setAsGlobal();
    $manager->bootEloquent();
    return $manager->getConnection('default');
};


$container['db'];

$container['pages_domain'] = function ($c){
    return new Domain;
};

$container['pages_responder'] = function ($c){
    return new Responder;
};