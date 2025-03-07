<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    const TAX_RATES = [
        'DE' => 0.19,
        'IT' => 0.22,
        'GR' => 0.24
    ];
}
