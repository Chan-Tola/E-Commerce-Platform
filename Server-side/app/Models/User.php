<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    protected $table = 'users';
    // 1. fillable fields (mass-assignable)
    protected $fillable = ['id', 'name', 'email', 'phone', 'address', 'password', 'role'];
    // 2. hiiden fields (not returned in JSON)
    protected $hidden = ['password', 'remember_token'];
    // 3. Casts (type conversions)
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // 4. Auto-hash password (optional but recommended)
    public function setPasswrodAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}