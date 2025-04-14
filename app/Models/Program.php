<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    // Define the table name explicitly
    protected $table = 'programs';

    // Specify the primary key if it is not `id`
    protected $primaryKey = 'id';

    // If the table does not have `created_at` and `updated_at`
    public $timestamps = false;

    // Define the fillable fields
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
}
