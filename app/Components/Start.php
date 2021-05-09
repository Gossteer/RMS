<?php

namespace App\Components;

use App\Models\HotelCategory;

class Start {
    public function run()
    {
        if (HotelCategory::all()->count() === 0) {
            for ($i = 1; $i < 6; $i++)
            {
                HotelCategory::create([
                    'name' => $i
                ]);
            }
        }

    }
}