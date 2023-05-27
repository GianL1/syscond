<?php

namespace Domain\Bloco\Actions;


use Domain\Bloco\DataTransferObjects\BlocoData;
use Domain\Bloco\Models\Bloco;

class CreateBlocoAction
{
    public function __invoke(BlocoData $blocoData): Bloco
    {

        return Bloco::create([
            'name_bloco' => $blocoData->name_bloco,
        ]);
    }
}
