<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbproduct'; // your table name

    protected $fillable = [
        'name',
        'price',
        'quantity',
        'status',
        'image',
        'sell_date',
    ];
}