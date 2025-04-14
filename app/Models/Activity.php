<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model 
{
    use HasFactory;

    protected $fillable = [
        'programid',
        'username', // Store trainer's username instead of user_id
        'activity_name',
        'due_date',
        'status',
    ];

    // Relationship with Program
    public function program()
    {
        return $this->belongsTo(Program::class, 'programid', 'programid');
    }
    
    public function activities()
{
    return $this->hasMany(Activity::class, 'programid', 'programid');
}



    // Updated relationship with User using username instead of user_id
    public function user()
    {
        return $this->belongsTo(User::class, 'username', 'username');
    }
}
