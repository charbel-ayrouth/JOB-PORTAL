<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'option_text',
        'points',
        'question_id',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
