<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'Jobprovider_id',
        'Job_id',
        'quiztitle',
        'nbquest',
        
    ];

    public function JobProvider()
    {
        return $this->hasOne(JobProvider::class);
    }

    public function Job()
    {
        return $this->hasOne(Job::class);
    }
}
