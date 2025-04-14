<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'programid', 'title', 'school', 'username', 'activity_name', 'category', 'due_date', 'basic_description', 'status', 'google_photos', 'hero_pic'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
