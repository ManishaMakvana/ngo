<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // ✅ Ensure it extends User (Authenticatable)

class Manager extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name', 'username', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed', // Laravel 10+ automatically hashes passwords
    ];

    public function getAuthIdentifierName()
    {
        return 'username'; // ✅ Ensure authentication happens via username
    }
}
