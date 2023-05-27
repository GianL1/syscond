<?php

namespace Domain\Apartment\Actions;

use Domain\Apartment\DataTransferObject\ApartmentData;
use Domain\Apartment\Models\Apartment;

class UpdateApartmentAction
{
    public function __invoke(ApartmentData $apartmentData): Apartment
    {
        $apartment = Apartment::find($apartmentData->id);

        $apartment->name_apartment = $apartmentData->name_apartment;
        $apartment->bloco_id = $apartmentData->bloco_id;
        $apartment->user_id = $apartmentData->user_id;
        $apartment->save();

        return $apartment;

    }
}
