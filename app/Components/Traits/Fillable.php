<?php

namespace App\Components\Traits;

use App\Components\Abstracts\Fillable as AbstractsFillable;

trait Fillable
{
    protected array $fillable = [];

    protected AbstractsFillable $set_fillable;

    public function __get(string $name)
    {
        return $this->set_fillable->$name;
    }

    public function __set(string $name, $value): bool
    {
        return ($this->set_fillable->$name = $value);
    }

    protected function setFillable(AbstractsFillable $fillable)
    {
        $this->set_fillable = $fillable;
    }
}
