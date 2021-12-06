<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeeker extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'degree',
        'user_id',
        'Field',
        'experience',
        'skills',
        'CoverLetter',
        'CV',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
