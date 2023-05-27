<?php

namespace App\Api\Bloco\Requests;

use Illuminate\Http\Request;

class BlocoRequest extends Request
{
    public function rules():array
    {
        return [
            'nome_bloco' => ['string', 'required']
        ];
    }
}
