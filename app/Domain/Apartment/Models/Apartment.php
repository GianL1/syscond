<?php

namespace Domain\Apartment\Models;

use Domain\Bloco\Models\Bloco;
use Domain\User\Models\User;
use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    public $timestamps = false;

    protected $fillable = ['name_apartment', 'bloco_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }

    public function bloco()
    {
        return $this->belongsTo(Bloco::class,'id');
    }
}
