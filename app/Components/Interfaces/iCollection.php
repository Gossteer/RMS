<?php

namespace App\Components\Interfaces;

interface iCollection {
    public function setData(array $data = []): void;
    public function find(int $id): object;
    public function delete(int $id): bool;
    public function getData();
    public function first();
}