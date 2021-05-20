<?php

namespace App\Components\Abstracts;

use App\Components\Interfaces\iFillableConvert;
use App\Components\Interfaces\iRequest;
use App\Components\Setting;
use App\Components\Traits\Fillable as TraitsFillable;

abstract class Request implements iFillableConvert, iRequest
{
    use TraitsFillable;

    public function __construct($request)
    {
        $this->setFillable(Setting::getFillable($this->fillable));
        
        $this->set_fillable->setFillable($request);
    }

    public function toArray(): array
    {
        return $this->set_fillable->toArray();
    }
}