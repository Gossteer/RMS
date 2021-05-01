<?php

namespace App\Components\Interfaces;

use App\Components\DataBase\DataBaseModelCollection;

interface iModels {
    public function getId(): ?int;
    public static function equalGet($equal_field, $equal_value): DataBaseModelCollection;
    public function update(array $data): bool;
    public function save(): bool;
    public static function all(): DataBaseModelCollection;
    public static function find(int $id): self;
    public static function delete(int $id): bool;
    public function destroy(): bool;
    public static function create(array $data): self;
}