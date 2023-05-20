<?php

namespace Domain\Condomino\Actions;

use Domain\Condomino\DataTransferObjects\CondominoData;
use Domain\Condomino\Models\Condomino;

final class CreateCondominoAction
{
    public function __invoke(CondominoData $condominoData):Condomino
    {
        return Condomino::create([
            'name' => $condominoData->name,
            'email' => $condominoData->email,
            'password' => $condominoData->password
        ]);
    }
}
