<?php

namespace Domain\Bloco\DataTransferObjects;

use App\Api\Bloco\Requests\BlocoRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;


class BlocoData extends DataTransferObject
{
    /**
     * @var string;
     */
    public $name_bloco;

    /**
     * @param BlocoRequest $blocoRequest
     * @return BlocoData
     * @throws UnknownProperties
     */
    public static function fromRequest(BlocoRequest $blocoRequest): BlocoData
    {
        $blocoRequest = json_decode($blocoRequest->getContent());

        return new Self([
            'name_bloco' => $blocoRequest->name_bloco,
        ]);
    }
}
