<?php

namespace App\Components\Abstracts;

use App\Components\Abstracts\Fillable as AbstractsFillable;
use App\Components\Interfaces\iCollection;
use App\Components\Traits\Fillable;
use Exception;

abstract class Collection implements iCollection {
    use Fillable;
    protected array $data = [];
    protected string $model_name;

    protected function setCollection(array $data = []): void
    {
        $this->data = $data;
    }

    public function __construct(AbstractsFillable $fillable, string $model_name) {
        $this->setCollection($fillable->toArray());
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

    public function toArray(): array
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

    public function count(): int
    {
        return count($this->data);
    }

    //Удаление из самой коллекции здесь, а из базы в классе датабазе модел коллектион

}