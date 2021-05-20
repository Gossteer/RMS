<?php

namespace App\Components\Interfaces;

interface iFillable {
    public function __set ( string $name , $value ) : bool;
    public function __get ( string $name );
    public function setFillable($date): bool;
    public function __construct(?array $fillable);
    public function fillable(): void;
}