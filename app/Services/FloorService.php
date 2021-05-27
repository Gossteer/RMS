<?php

namespace App\Services;

use App\Models\Floor;
use App\Models\Hotel;

class FloorService
{
    public function deleteFloorWithCountFloorHotel(int $floor_id): void
    {
        $floor = Floor::find($floor_id);

        $hotel = $floor->manyToOne('Hotel');

        $hotel->update([
            'floor' => $hotel->floor != 0 ? --$hotel->floor : 0
        ]);
        

        $floor->destroy();
    }
}
