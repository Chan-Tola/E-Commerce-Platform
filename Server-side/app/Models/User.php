<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    const TABLENAME = 'users';
    const ID = 'id';
    const USERNAME = 'name';
    const USEREMAIL = 'email';
    const USERPASSWORD = 'password';
    const USERCONTACT = 'phone';
    const USEREADDRESS = 'address';
    const USERROLE = 'role';

    // 1. fillable fields (mass-assignable)
    protected $fillable =
    [
        self::USERNAME,
        self::USEREMAIL, 
        self::USERPASSWORD,
        self::USERCONTACT,
        self::USEREADDRESS,
        self::USERROLE,
    ];
    // 2. hiiden fields (not returned in JSON)
    protected $hidden =
    [
        'password',
        'remember_token'
    ];
    // 3. Casts (type conversions)
    protected $casts =
    [
        'email_verified_at' => 'datetime',
    ];
    // 4. Auto-hash password (optional but recommended)
    public function setPasswrodAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}