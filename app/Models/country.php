<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class country extends Model
{
    use HasFactory;
    protected $fillable =[
        'id',
        'iso',
        'name',
        'nicename',
        'iso3',
        'numcode',
        'phonecode'
    ];
}
