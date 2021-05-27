<?php

namespace App\Components\Abstracts;

use Exception;

abstract class Controller
{
    public function __call($name, $arguments)
    {
        throw new Exception("Вызываемый метод ($name) не существует в контроллере " . static::class);
    }
}
