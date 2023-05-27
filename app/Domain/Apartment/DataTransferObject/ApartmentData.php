<?php

namespace Domain\Apartment\DataTransferObject;

use App\Api\Apartment\Requests\ApartmentRequest;
use Spatie\DataTransferObject\DataTransferObject;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class ApartmentData extends DataTransferObject
{
    /**
     * @var string
     */
    public string $name_apartment;

    /**
     * @var int
     */
    public int $bloco_id;

    /**
     * @var int|null
     */
    public ?int $user_id;

    /**
     * @param ApartmentRequest $apartmentRequest
     * @return ApartmentData
     * @throws UnknownProperties
     */
    public static function fromRequest(ApartmentRequest $apartmentRequest): ApartmentData
    {
        $apartmentRequest = json_decode($apartmentRequest->getContent());

        return new Self([
            'name_apartment' => $apartmentRequest->name_apartment,
            'bloco_id' => $apartmentRequest->bloco_id,
            'user_id' => $apartmentRequest->user_id
        ]);
    }
}
