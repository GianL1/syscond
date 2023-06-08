<?php

namespace Domain\User\DataTransferObjects;

use App\Api\User\Requests\UserRequest;

class AuthUserData extends UserData
{
    public static function fromRequest(UserRequest $userRequest): UserData
    {
        $userRequest = json_decode($userRequest->getContent());

        return new Self([
            'email' => $userRequest->email,
            'password' => $userRequest->password,
        ]);
    }
}
