<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'tbproduct'; // this is my dataname for get it to show in the view
    
    public $fillable = [
        'name', 'price', 'quantity', 'image', 'status', 'sell_date',
    ];
}