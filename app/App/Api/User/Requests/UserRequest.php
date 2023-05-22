<?php

namespace App\Api\User\Requests;

use Illuminate\Http\Request;

class UserRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'password' => ['required', 'string']
        ];
    }
}
