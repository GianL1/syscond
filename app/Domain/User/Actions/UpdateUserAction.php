<?php

namespace Domain\User\Actions;

use Domain\User\DataTransferObjects\UpdateUserData;
use Domain\User\Models\User;
use Support\Enum\StatusHttpEnum;

class UpdateUserAction
{
    public function __invoke(UpdateUserData $userData): User
    {

        $user = $this->validateFields($userData);
        $user->save();

        return $user;

    }

    private function validateFields(UpdateUserData $userData)
    {
        $user = User::find($userData->id);

        $user->name = $userData->name;
        $user->email = $this->validateEmail($user, $userData);
        $user->password = $this->validatePassword($user, $userData);

    }

    private function validateEmail(User $user, UpdateUserData $userData)
    {
        if (
            $userData->email
            && $userData->email !== $user->email
            && User::where('email', $userData->email)->count() === 0
        ) {
            $user->email = $userData->email;
        }

        return $user->email;

    }

    private function validatePassword(User $user, UpdateUserData $userData)
    {
        if (
            $userData->password
            && $userData->password !== $user->password
            && password_verify($userData->password_confirm, $userData->password)
        ) {
            $user->password = $userData->password;
        }

        return $user->password;
    }

}
