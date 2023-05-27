<?php

namespace Domain\Bloco\Actions;

use Domain\Bloco\Models\Bloco;
use Support\Enum\StatusHttpEnum;

class DeleteBlocoAction
{
    public function __invoke(int $blocoData)
    {

        $bloco = Bloco::find($blocoData);

        if ($bloco->count() === 0) {

            return response()->json([
                'Error' => 'Bloco não encontrado'
            ], StatusHttpEnum::NOT_FOUND);

        }

        $bloco->delete();

        return response()->json([
            'success' => 'Bloco removido com sucesso'
        ], StatusHttpEnum::OK
        );

    }
}
