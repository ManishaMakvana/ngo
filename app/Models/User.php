<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = ['username', 'password','programid'];
    protected $hidden = ['password'];

    public function modules()
    {
        return $this->hasMany(Module::class, 'program_id');
    }

   
}
