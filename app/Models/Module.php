<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $table = 'modules';

    protected $fillable = [
        'programid',
        'module_id',
        'std',
        'document_type',
        'title',
        'publish_link',
        'presentation_link',
        'youtube_voiceover',
        'google_slide',
        'worksheet',
    ];

    // Define the relationship with the User model (if necessary)
    public function user()
    {
        return $this->belongsTo(User::class, 'programid', 'programid');
    }
}
