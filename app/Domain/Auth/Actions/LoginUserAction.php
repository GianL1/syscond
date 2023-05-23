<?php

namespace Domain\Auth\Actions;

use Domain\User\DataTransferObjects\UserData;

class LoginUserAction
{
    public function __invoke(UserData $userData)
    {

        return auth()->attempt(
            [
                'email' => $userData->email,
                'password' => $userData->password
             ]
        ) ?? null;
    }
}
