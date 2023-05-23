<?php

namespace App\Api\User\Controllers;

use App\Api\User\Requests\UserRequest;
use App\Core\Http\Controllers\Controller;
use Domain\User\Actions\UpdateUserAction;
use Domain\User\DataTransferObjects\UpdateUserData;


class UserController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->loggedUser = auth()->user();
    }

    public function update(UserRequest $request, UpdateUserAction $action)
    {

        $data = UpdateUserData::fromRequest($request);

        dd($data);
        $response = $action($data);

        return response()->json([
            'Success' => $response
        ]);
    }
}
