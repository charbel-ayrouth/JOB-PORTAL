<?php

namespace App\Models;

use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
//+quiz_id
    protected $fillable = [
        'name',
        'quiz_id',
    ];

    public function categoryQuestions()
    {
        return $this->hasMany(Question::class, 'category_id', 'id');
    }
    public function quiz(){
        return $this->hasOne(Quiz::class,'quiz_id','id');
    }
}
