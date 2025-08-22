<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //note:TABLE NAME
    const TABLENAME = 'order';
    const ORDER_CODE = 'id'; //todo:PK
    const ORDER_QTY  = 'quantity';
    const TOTAL = 'total';

    const USER_ID = 'user_id';
    const USERNAME = 'name';

    protected $table = self::TABLENAME;
    protected $primaryKey = self::ORDER_CODE;

    protected $fillable = [
        self::ORDER_QTY,
        self::TOTAL,
        self::USER_ID,
        self::USERNAME,
    ];

    //Relationship
    public function user()
    {
        return $this->belongsTo(User::class, self::USER_ID);
    }
}
