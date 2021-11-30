<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'Jobprovider_id',
        'JobTitle',
        'Field',
        'Description',
        'Location_id',
        'Requirements',
        'JobSkillLevel',
        'ValidationTime'
    ];
    public function Location(){
        return $this->hasMany(Locations::class);
    }
    public function JobProvider(){
        return $this->hasOne(JobProvider::class);
    }
}
