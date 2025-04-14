<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'register'; // ✅ Set the correct table name

    protected $fillable = [
        'username', // ✅ Change 'name' to 'username'
        'email',
        'school',
        'programid',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
