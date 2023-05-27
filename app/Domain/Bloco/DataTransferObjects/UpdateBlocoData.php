<?php

namespace Domain\Bloco\DataTransferObjects;

use App\Api\Bloco\Requests\BlocoRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UpdateBlocoData extends BlocoData
{
    /** @var int */
    public $id;

    /**
     * @param BlocoRequest $blocoRequest
     * @return BlocoData
     * @throws UnknownProperties
     */
    public static function fromRequest(BlocoRequest $blocoRequest): UpdateBlocoData
    {
        $blocoRequest = json_decode($blocoRequest->getContent());

        return new Self([
            'id' => $blocoRequest->id,
            'name_bloco' => $blocoRequest->name_bloco,
        ]);
    }
}
