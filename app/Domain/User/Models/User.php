<?php

namespace Domain\User\Models;

use Domain\Apartment\Models\Apartment;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable = ['name', 'email', 'password', 'apartments_id'];
    protected $hidden = ['password', 'token'];

    public function getJWTIdentifier()
    {
        return $this->getAttribute($this->getKeyName());
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function apartment()
    {
        return $this->hasOne(Apartment::class,'id');
    }
}
