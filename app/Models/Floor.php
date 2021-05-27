<?php

namespace App\Models;

use App\Components\Abstracts\Models;

class Floor extends Models
{
    protected array $fillable = [
        'rooms',
        'hotel_id'
    ];

    protected array $relationship = [
        'manyToOne' => [
            'Hotel'
        ],
    ];
}
