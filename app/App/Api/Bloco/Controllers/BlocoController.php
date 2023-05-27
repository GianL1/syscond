<?php

namespace App\Api\Bloco\Controllers;

use App\Api\Bloco\Requests\BlocoRequest;
use App\Api\User\Requests\UserRequest;
use App\Core\Http\Controllers\Controller;
use Domain\Bloco\Actions\CreateBlocoAction;
use Domain\Bloco\Actions\DeleteBlocoAction;
use Domain\Bloco\Actions\UpdateBlocoAction;
use Domain\Bloco\DataTransferObjects\BlocoData;
use Domain\Bloco\DataTransferObjects\UpdateBlocoData;
use Domain\User\Actions\UpdateUserAction;
use Domain\User\DataTransferObjects\UpdateUserData;
use Illuminate\Http\JsonResponse;
use Support\Enum\StatusHttpEnum;

class BlocoController extends Controller
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


    public function create(BlocoRequest $request, CreateBlocoAction $action)
    {

        $data = BlocoData::fromRequest($request);

        $response = $action($data);

        return response()->json([
            'Success' => $response
        ], StatusHttpEnum::OK);
    }

    public function update(BlocoRequest $request, UpdateBlocoAction $action)
    {

        $data = UpdateBlocoData::fromRequest($request);

        $response = $action($data);

        return $response;
    }

    public function delete(BlocoRequest $request, DeleteBlocoAction $action)
    {

        $request = json_decode($request->getContent());

        $response = $action($request->id);

        return $response;
    }
}
