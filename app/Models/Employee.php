<?php

namespace App\Models;

use App\Components\Abstracts\Models;

class Employee extends Models {
    protected array $fillable = [
        'name',
        'hotel_id'
    ];

    protected array $relationship = [
        'manyToOne' => [
            'Hotel'
        ]
    ];
}