<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // your table name
    const TABLENAME = 'tbproduct';
    const ID = 'id';
    const NAME = 'name';
    const PRICE = 'price';
    const QUANTITY = 'quantity';
    const STATUS = 'status';
    const IMAGE = 'image';
    const SELL_DATE = 'sell_date';
    protected $table = self::TABLENAME;
    protected $fillable = [
        self::NAME,
        self::PRICE,
        self::QUANTITY,
        self::STATUS,
        self::IMAGE,
        self::SELL_DATE,
    ];
}
