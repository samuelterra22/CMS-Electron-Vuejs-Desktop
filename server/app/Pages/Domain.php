<?php

namespace App\Pages;

use Aura\Filter\FilterFactory;

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

        $this->validation($data);

        return $this->model->create($data);
    }

    protected function validation($data)
    {
        $isValid = $this->validate($data);

        if ($isValid['status'] === 'error') {
            throw new \Exception('Dados inválidos ' . json_encode($isValid['messages']));
        }
    }

    private function validate($data)
    {
        $filterFactory = new FilterFactory;
        $filter = $filterFactory->newSubjectFilter();

        $filter->validate('title')->is('alnum');
        $filter->validate('title')->isNot('int');
        $filter->validate('title')->is('strlenMin', 3);

        $filter->validate('body')->isNotBlank();
        $filter->validate('body')->is('strlenMin', 10);

        if (!$filter->apply($data)) {
            $messages = $filter->getFailures()
                ->getMessages();
            return [
                'status'   => 'error',
                'messages' => $messages
            ];
        }
        return ['status' => 'success'];
    }

    public function __call($name, $arguments)
    {
        return call_user_func_array([
            $this->model,
            $name
        ], $arguments);
    }

}