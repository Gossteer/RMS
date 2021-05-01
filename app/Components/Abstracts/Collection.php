<?php

namespace App\Components\Abstracts;

use App\Components\Interfaces\iCollection;
use Exception;

abstract class Collection implements iCollection {
    protected array $data = [];
    protected string $model_name;

    public function setData(array $data = []): void
    {
        $this->data = $data;
    }

    public function __construct(array $data = [], string $model_name) {
        $this->setData($data);
        $this->model_name = $model_name;
    }

    public function find(int $id): object
    {
        $data = $this->data[$id] ?? false;

        if ($data) {
            return new $this->model_name($data);
        }

        throw new Exception('Данные не найдены');
    }

    public function delete(int $id): bool
    {
        if (isset($this->data[$id])) {
            unset($this->data[$id]);
            return true;
        }

        throw new Exception('Данные не найдены');
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function first()
    {
        $data = array_shift($this->data) ?? false;

        if ($data) {
            return new $this->model_name($data);
        }

        throw new Exception('Данные не найдены');
    }

    //Удаление из самой коллекции здесь, а из базы в классе датабазе модел коллектион

}