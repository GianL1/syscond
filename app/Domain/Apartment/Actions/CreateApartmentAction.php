<?php

namespace Domain\Apartment\Actions;

use Domain\Apartment\DataTransferObject\ApartmentData;
use Domain\Apartment\Models\Apartment;

class CreateApartmentAction
{
    public function __invoke(ApartmentData $apartmentData): Apartment
    {

        return Apartment::create([
            'name_apartment' => $apartmentData->name_apartment,
            'bloco_id' => $apartmentData->bloco_id,
            'user_id' => $apartmentData->user_id
        ]);
    }
}
