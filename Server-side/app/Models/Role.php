<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public const TABLENAME = 'role';
    public const ID = 'id';
    public const NAME = 'name'; // e.g. Admin, Manager, Staff
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';

}
