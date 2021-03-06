<?php

namespace App\Models;

use App\Models\Result;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'email',
        'name',
        'password',
        'role_id',
        'path',
        'location_id',
        'phoneNumber',
        'VerificationToken',
        'gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function JobProvider()
    {
        return $this->hasOne(JobProvider::class);
    }
    public function JobSeeker()
    {
        return $this->hasOne(JobSeeker::class);
    }
    public function Location()
    {
        return $this->hasOne(Locations::class);
    }


    //new for test
    public function userResults()
    {
        return $this->hasMany(Result::class, 'user_id', 'id');
        // return $this->hasOne(Result::class, 'user_id', 'id');
    }
}
