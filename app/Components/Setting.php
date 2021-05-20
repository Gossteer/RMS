<?php

namespace App\Components;

use App\Components\Abstracts\Fillable;
use App\Components\Abstracts\Request;
use App\Components\Interfaces\iSetting;
use App\Components\Interfaces\iTypeConnection;
use App\Components\Interfaces\iTypeTemplateEngine;

final class Setting implements iSetting
{
    final public static function getTypeConnection(): iTypeConnection
    {
        $gettypeconnection = 'App\Components\DataBase\TypeConnection\\' . ucfirst(CONFIG['Database']['type']) . 'Connection';
        return new $gettypeconnection();
    }

    final public static function getTypeTemplateEngine(): iTypeTemplateEngine
    {
        $get_type_template_engine = 'App\Components\TemplateEngine\TypeTemplateEngine\\' . ucfirst(CONFIG['TemplateEngine']['type']) . 'Index';
        return new $get_type_template_engine();
    }

    final public static function getFillable(?array $fillable): Fillable
    {
        $get_type_fillable = 'App\Components\Fillable\\' . 'Fillable' . ucfirst(CONFIG['Fillable']['type']);
        return new $get_type_fillable($fillable);
    }

    final public static function getRequest($request): Request
    {
        $get_type_request = 'App\Components\Request\\' . 'Request' . ucfirst(CONFIG['Request']['type']);
        return new $get_type_request($request);
    }
}
