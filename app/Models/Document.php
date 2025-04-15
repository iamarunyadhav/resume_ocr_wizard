<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'context',
        'original_filename',
        'file_path',
        'extracted_text',
        'extracted_fields',
        'user_id'
    ];

    protected $casts = [
        'extracted_fields' => 'array',
    ];
}
