<?php

namespace App\Api\Apartment\Requests;

use Illuminate\Http\Request;

class ApartmentRequest extends Request
{

    public function rules():array
    {
        return [
            'nome_aparment' => ['string', 'required'],
            'bloco_id' => ['int', 'required'],
            'user_id' => ['int']
        ];
    }
}
