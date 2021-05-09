<?php

namespace App\Components\Request;

use App\Components\Interfaces\iFillable;
use App\Components\Traits\Fillable;

class Request implements iFillable
{
    use Fillable;

    protected array $fillable = [];

    public function __construct(array $attributes)
    {
        $this->fillable = [
            'get' => [],
            'post' => [],
            'parameters' => []
        ];
        $this->setFillable($attributes);
    }
}
