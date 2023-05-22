<?php

namespace Domain\User\DataTransferObjects;

use App\Api\User\Requests\UserRequest;
use Spatie\DataTransferObject\DataTransferObject;

class UserData extends DataTransferObject
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;


    public static function fromRequest(UserRequest $userRequest): UserData
    {
        $userRequest = json_decode($userRequest->getContent());

        return new Self([
            'name' => $userRequest->name,
            'email' => $userRequest->email,
            'password' => password_hash($userRequest->password, PASSWORD_DEFAULT)
        ]);
    }

}
