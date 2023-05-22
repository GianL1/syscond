<?php

namespace App\Api\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{

    public function rules():array
    {
        return [
            'nome' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string']
        ];
    }
}
