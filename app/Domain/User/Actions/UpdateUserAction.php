<?php

namespace Domain\User\Actions;

use Domain\User\DataTransferObjects\UserData;
use Domain\User\Models\User;

class UpdateUserAction
{
    public function __invoke(UserData $userData): User
    {

        $user = User::find($userData->id);

    }
}
