<?php

namespace App\Components\Interfaces;

use App\Components\Abstracts\Fillable;
use App\Components\Abstracts\Request;

interface iSetting
{
    public static function getTypeConnection(): iTypeConnection;
    public static function getTypeTemplateEngine(): iTypeTemplateEngine;
    public static function getFillable(?array $fillable): Fillable;
    public static function getRequest($request): Request;
}
