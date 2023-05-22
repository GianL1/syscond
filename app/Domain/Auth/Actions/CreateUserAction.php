<?php

namespace Domain\Auth\Actions;

use Domain\User\Models\User;
use Domain\User\DataTransferObjects\UserData;

final class CreateUserAction
{
    public function __invoke(UserData $userData): User
    {

        return User::create([
            'name' => $userData->name,
            'email' => $userData->email,
            'password' => $userData->password
        ]);
    }
}
