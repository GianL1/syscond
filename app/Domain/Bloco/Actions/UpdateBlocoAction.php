<?php

namespace Domain\Bloco\Actions;

use Domain\Bloco\DataTransferObjects\UpdateBlocoData;
use Domain\Bloco\Models\Bloco;
use Support\Enum\StatusHttpEnum;

class UpdateBlocoAction
{
    public function __invoke(UpdateBlocoData $blocoData): Bloco
    {

        $bloco = $this->validateNome($blocoData);
        $bloco->save();

        return $bloco;

    }

    private function validateNome(UpdateBlocoData $blocoData)
    {
        $bloco = Bloco::find($blocoData->id);

        if ($blocoData->name_bloco) {
            $bloco->name_bloco = $blocoData->name_bloco;
        }

        return $bloco;
    }
}
