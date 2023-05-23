<?php

namespace Domain\User\DataTransferObjects;

use App\Api\User\Requests\UserRequest;

class UpdateUserData extends UserData
{
    /** @var int */
    public $id;
    public static function fromRequest(UserRequest $userRequest): UserData
    {
        $userRequest = json_decode($userRequest->getContent());


        return new Self([
            'id' => $userRequest->id,
            'name' => $userRequest->name,
            'email' => $userRequest->email,
            'password' => password_hash($userRequest->password, PASSWORD_DEFAULT)
        ]);
    }
}
