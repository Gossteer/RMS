<?php

namespace App\Controllers;

use App\Components\Abstracts\Request;
use App\Components\Response\Response;
use App\Models\Hotel;

class HotelController
{
    /**
     * Action для главной страницы
     */
    public function create(Request $request)
    {
        Hotel::create([
            'name' => $request->post['name_hotel'],
            'floor' => $request->post['floor_hotel'],
            'hotelcategory_id' => $request->post['select_hotelcategory_id']
        ]);

        Response::redirect();
    }
}
