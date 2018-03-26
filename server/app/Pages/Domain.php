<?php

namespace App\Pages;

class Domain
{
    private $model;

    public function __construct()
    {
        $this->model = new Model();
    }

    public function create()
    {
        $data = [
            'title' => filter_input(INPUT_POST, 'title'),
            'body'  => filter_input(INPUT_POST, 'body'),
            'slug'  => filter_input(INPUT_POST, 'slug')
        ];
        return $this->model->create($data);
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([
            $this->model,
            $name
        ], $arguments);
    }

}