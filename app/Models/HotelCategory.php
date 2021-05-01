<?php

namespace App\Models;

use App\Components\Abstracts\Models;

class HotelCategory extends Models {
    protected array $fillable = [
        'name'
    ];

    protected array $relationship = [
        'oneToMany' => [
            'Hotel'
        ]
    ];
}