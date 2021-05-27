<?php

namespace App\Models;

use App\Components\Abstracts\Models;

class Hotel extends Models
{
    protected array $fillable = [
        'name',
        'floor',
        'hotelcategory_id'
    ];

    protected array $relationship = [
        'manyToOne' => [
            'HotelCategory'
        ],
        'oneToMany' => [
            'Employee',
            'Floor'
        ],
    ];
}
