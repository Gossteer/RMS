<?php

namespace App\Components\Interfaces;

use App\Components\Abstracts\Fillable;

interface iTypeConnection {
    public function getData(string $modal_name, int $count = null, int $id = null, $equal_field = null, $equal_value= null): Fillable;
    public function setData(string $modal_name, int $id, Fillable $fillable): bool;
    public function saveData(string $modal_name, Fillable $fillable): int;
    public function deleteData(string $modal_name, int $id): bool;
}