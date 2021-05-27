<?php

namespace App\Services;

use App\Components\Abstracts\Request;
use App\Models\Floor;
use App\Models\Hotel;

class HotelService
{
    //Создание отеля вместе с его этажами
    public function createHotelWithFloor(Request $request): array
    {
        $hotel = Hotel::create([
            'name' => $request->post['name_hotel'],
            'floor' => $request->post['floor_hotel'],
            'hotelcategory_id' => $request->post['select_hotelcategory_id']
        ]);

        $floors = [];
        for ($i = 0; $i < $hotel->floor; $i++) {
            $floors[] = Floor::create([
                'rooms' => $request->post['rooms_floor'],
                'hotel_id' => $hotel->getId()
            ]);
        }
        return [$hotel, $floors];
    }

    public function deleteHotelWithFloor(int $hotel_id): void
    {
        $hotel = Hotel::find($hotel_id);
        
        foreach ($hotel->oneToMany('Floor')->toArray() as $floor) {
            Floor::delete($floor['id']);
        }

        $hotel->destroy();
    }
}
