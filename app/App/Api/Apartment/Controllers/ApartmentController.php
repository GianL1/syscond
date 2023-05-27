<?php

namespace App\Api\Apartment\Controllers;

use App\Api\Apartment\Requests\ApartmentRequest;
use App\Core\Http\Controllers\Controller;
use Domain\Apartment\Actions\CreateApartmentAction;
use Domain\Apartment\Actions\UpdateApartmentAction;
use Domain\Apartment\DataTransferObject\ApartmentData;
use Domain\Apartment\DataTransferObject\UpdateApartmentData;
use Illuminate\Http\JsonResponse;
use Support\Enum\StatusHttpEnum;

class ApartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', [
            'except' => [
                'login',
                'create',
                'unauthorized'
            ]
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function unauthorized()
    {
        return response()->json([
            'error' => 'Não autorizado'
        ], 401);
    }


    public function create(ApartmentRequest $request, CreateApartmentAction $action)
    {

        $data = ApartmentData::fromRequest($request);

        $response = $action($data);

        return response()->json([
            'Success' => $response
        ], StatusHttpEnum::OK);
    }

    public function update(ApartmentRequest $request, UpdateApartmentAction $action)
    {

        $data = UpdateApartmentData::fromRequest($request);

        $response = $action($data);

        return $response;
    }
}
