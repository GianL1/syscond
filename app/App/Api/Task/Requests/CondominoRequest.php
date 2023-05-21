<?php

namespace App\Api\Task\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CondominoRequest extends FormRequest
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
