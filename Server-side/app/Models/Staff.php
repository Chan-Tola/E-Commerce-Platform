<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Staff extends Authenticatable
{
    use HasFactory, HasRoles;
    const TABLENAME = 'tbstaff';
    protected $table = self::TABLENAME;
    //note: Column constants
    const ID = 'id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const GENDER = 'gender';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const PHONE = 'phone';
    const ADDRESS = 'address';
    const ROLE = 'role';
    const DOB = 'date_of_birth';
    const HIRE_DATE = 'hire_date';
    const STATUS = 'status';
    const PROFILE = 'profile_picture';

    //note: Status enum constants
    const STATUS_ACTIVE = 'active';
    const STATUS_RESIGNED = 'offline';


    protected $fillable =
    [
        self::EMAIL,
        self::PASSWORD,
        self::PROFILE,
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
