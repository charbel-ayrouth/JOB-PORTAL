<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Locations extends Model
{
    use HasFactory;
    protected $table='locations';
    protected $fillable = [
        'id',
        'Country',
        'Address',
        'City',
        'ZipCode'
    ];

    public function User(){
        return $this->HasMany(User::class);
    }

}
