<?php

namespace App\Components\Interfaces;

use App\Components\DataBase\DataBaseModelCollection;

interface iRelationship {
    public function oneToMany(string $name_relationship): DataBaseModelCollection;
    public function manyToOne(string $name_relationship): object;
    public function oneToOneMain(string $name_relationship): object;
    public function oneToOne(string $name_relationship): object;
}