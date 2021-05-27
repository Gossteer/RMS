<?php

namespace App\Controllers;

use App\Components\Abstracts\Controller;
use App\Components\Abstracts\Request;
use App\Components\Response\Response;
use App\Models\Hotel;
use App\Services\HotelService;

class HotelController extends Controller
{
    /**
     * Action Для создания отеля
     */
    public function create(Request $request)
    {
        $response = (new HotelService)->createHotelWithFloor($request);

        Response::redirect();
    }

    /**
     * Action для удаления отеля
     */
    public function delete(Request $request)
    {
        (new HotelService)->deleteHotelWithFloor($request->get['hotel_id']);

        Response::redirect();
    }
}
