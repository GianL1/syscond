<?php

namespace Domain\User\Models;

use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    public $timestamps = false;

    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password', 'token'];

    public function getJWTIdentifier()
    {
        return $this->getAttribute($this->getKeyName());
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
