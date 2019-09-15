<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'products_id',
        'name',
        'categories',
        'type',
        'model',
        'photo',
        'size',
        'color',
        'additional information',
        'price',
        'old_price',
        'status',
        'color',
        'description',
        'reviews',

    ];

}
