<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'programid',
        'title',
        'username',
        'school',
        'activity_name',
        'girls',
        'boys',
        'teacher',
        'due_date',
        'basic_description',
        'google_photos',
        'hero_pic'
    ];
}
