<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\type;

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
        'ValidationTime',
        'type',
    ];
    public function Location()
    {
        return $this->hasMany(Locations::class);
    }
    public function JobProvider()
    {
        return $this->hasOne(JobProvider::class);
    }
    public function category()
    {
        return $this->hasOne(Category::class);
    }
}
