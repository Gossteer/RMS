<?php

namespace App\Controllers;

use App\Components\Abstracts\Controller;
use App\Components\Abstracts\Request;
use App\Components\Response\Response;
use App\Services\FloorService;

class FloorController extends Controller
{
    /**
     * Action для главной страницы
     */
    public function delete(Request $request)
    {
        (new FloorService)->deleteFloorWithCountFloorHotel($request->get['floor_id']);

        Response::redirect();
    }
}
