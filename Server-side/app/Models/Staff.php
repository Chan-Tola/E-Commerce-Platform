<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Authenticatable
{
    use HasFactory;
    const TABLENAME = 'tbstaff';
    protected $table = self::TABLENAME;
    const ID = 'id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    CONST GENDER = 'gender';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const PHONE = 'phone';
    const ADDRESS = 'address';
    const ROLE = 'role';
    CONST DOB = 'date_of_birth';
    CONST HIRE_DATE = 'hire_date';
    CONST STATUS = 'status';
    CONST PHOTO = 'profile_picture';

    protected $fillable =
    [
        self::EMAIL,
        self::PASSWORD,
        self::PHOTO,
        self::ADDRESS,
        self::ROLE,
        self::DOB,
        self::HIRE_DATE,
        self::STATUS,
        self::PHONE,
        self::FIRST_NAME,
        self::LAST_NAME,
        self::GENDER,
    ];
    protected $hidden = [self::PASSWORD];
    protected $casts = [
        self::DOB => 'date',
        self::HIRE_DATE => 'date',
    ];

}
