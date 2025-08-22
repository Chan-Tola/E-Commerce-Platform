<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    //note: TABLENAME
    const TABLENAME = 'product_details';
    protected $table = self::TABLENAME;
    // CONSTANTS FOR COLUMN NAMES
    const ID = 'id';
    const PRODUCT_ID = 'product_id';
    const UNITPRICE = 'unit_price';
    const ADMIN_NOTES = 'admin_notes';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    //note: FILLABLE FIELDS FOR MASS ASSIGNMENT
    protected $fillable = [
        self::PRODUCT_ID,
        self::UNITPRICE,
        self::ADMIN_NOTES,
    ];
    //note: RELATION TO PRODUCT MODEL
    public function product()
    {
        return $this->belongsTo(Product::class, self::PRODUCT_ID);
    }
}
