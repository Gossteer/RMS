<?php

namespace App\Controllers;

use App\Components\TemplateEngine\TemplateEngine;

class HotelController
{
    /**
     * Action для главной страницы
     */
    public function create($re)
    {
        

        return TemplateEngine::getInstance()->render('main/index.php', ['pelmen' => 'lol']);
    }
}