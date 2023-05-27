<?php

namespace Domain\Bloco\Models;

use Domain\Apartment\Models\Apartment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bloco extends Model
{
    public $timestamps = false;

    protected $fillable = ['id', 'name_bloco', 'apartments'];
    public function apartments(): HasMany
    {
        return $this->hasMany(Apartment::class);
    }
}
