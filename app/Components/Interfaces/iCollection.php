<?php

namespace App\Components\Interfaces;

interface iCollection
{
    public function find(int $id): object;
    public function delete(int $id): bool;
    public function toArray(): array;
    public function first();
    public function count(): int;
}
