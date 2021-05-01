<?php

namespace App\Components\Interfaces;

interface iTypeConnection {
    public function getData(string $modal_name, int $count = null, int $id = null, $equal_field = null, $equal_value= null): array;
    public function setData(string $modal_name, int $id, array $fillable): bool;
    public function saveData(string $modal_name, array $fillable): int;
    public function deleteData(string $modal_name, int $id): bool;
}