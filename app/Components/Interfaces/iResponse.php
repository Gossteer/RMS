<?php

namespace App\Components\Interfaces;

interface iResponse {
    public static function redirect(string $route = '/', bool $replace = true, int $response_code = 303): void;
}