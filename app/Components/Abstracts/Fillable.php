<?php

namespace App\Components\Abstracts;

use App\Components\Interfaces\iFillable;
use App\Components\Interfaces\iFillableConvert;
use Exception;

abstract class Fillable implements iFillable, iFillableConvert
{
    protected function errorSetFillableType(string $type)
    {
        throw new Exception("Измените конфигурацию на другую структуру данных (сейчас $type)");
    }
}
