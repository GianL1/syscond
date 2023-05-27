<?php

namespace Domain\Apartment\DataTransferObject;

use App\Api\Apartment\Requests\ApartmentRequest;
use Spatie\DataTransferObject\Exceptions\UnknownProperties;

class UpdateApartmentData extends ApartmentData
{
    /**
     * @var int
     */
    public int $id;

    /**
     * @param ApartmentRequest $apartmentRequest
     * @return ApartmentData
     * @throws UnknownProperties
     */
    public static function fromRequest(ApartmentRequest $apartmentRequest): ApartmentData
    {
        $apartmentRequest = json_decode($apartmentRequest->getContent());

        return new Self([
            'id' => $apartmentRequest->id,
            'name_apartment' => $apartmentRequest->name_apartment,
            'bloco_id' => $apartmentRequest->bloco_id,
            'user_id' => $apartmentRequest->user_id
        ]);
    }
}
