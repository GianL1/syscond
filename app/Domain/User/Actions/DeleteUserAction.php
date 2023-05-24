<?php

namespace Domain\User\Actions;

use Domain\User\DataTransferObjects\UpdateUserData;
use Domain\User\Models\User;
use Support\Enum\StatusHttpEnum;

class DeleteUserAction
{
    public function __invoke(int $userData)
    {

        $user = User::find($userData);

        if ($user->count() === 0) {

            return response()->json([
                'Error' => 'Usuário não encontrado'
            ], StatusHttpEnum::NOT_FOUND);

        }

        $user->delete();

        return response()->json([
            'success' => 'Usuário removido com sucesso'
            ], StatusHttpEnum::OK
        );

    }
}
