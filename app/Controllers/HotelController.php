<?php

namespace App\Controllers;

use App\Components\Request\Request;
use App\Components\Response\Response;
use App\Models\Hotel;

class HotelController
{
    /**
     * Action для главной страницы
     */
    public function create(Request $response)
    {
        Hotel::create([
            'name' => $response->post['name_hotel'],
            'floor' => $response->post['floor_hotel'],
            'hotelcategory_id' => $response->post['select_hotelcategory_id']
        ]);

        Response::redirect();
    }
}
