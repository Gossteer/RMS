<?php

namespace App\Components\Request;

use App\Components\Abstracts\Request;

class RequestDefault extends Request
{
    protected array $fillable = [
        'get' => [],
        'post' => [],
        'session' => []
    ];
}
