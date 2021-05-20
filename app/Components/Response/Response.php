<?php

namespace App\Components\Response;

use App\Components\Interfaces\iResponse;

class Response implements iResponse
{
    public static function redirect(string $route = '/', bool $replace = true, int $response_code = 303): void
    {
        exit(header("Location: $route", $replace, $response_code));
    }
}
