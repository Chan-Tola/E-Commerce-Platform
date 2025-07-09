<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Staff extends Authenticatable
{
    use HasFactory;
    protected $table = 'tbstaff';
    
    protected $fillable = 
    [
        'full_name', 
        'email', 
        'password', 
        'phone', 
        'address', 
        'role', 
        'date_of_birth', 
        'hire_date', 
        'status', 
        'profile_picture'];
    protected $hidden = ['password'];
    protected $casts = 
    [
        'date_of_birth', 
        'hire_date'
    ];
}