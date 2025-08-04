<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    public const TABLENAME = 'permission';
    public const ID = 'id';
    public const TITLE = 'title'; // e.g. view_product, edit_product, delete_staff
    public const CREATED_AT = 'created_at';
    const UPDATED_AT = null;
}
