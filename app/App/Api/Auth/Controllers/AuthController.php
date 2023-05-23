<?php

namespace App\Api\Auth\Controllers;

use App\Api\User\Requests\UserRequest;
use App\Core\Http\Controllers\Controller;
use Domain\Auth\Actions\CreateUserAction;
use Domain\Auth\Actions\LoginUserAction;
use Domain\User\DataTransferObjects\AuthUserData;
use Domain\User\DataTransferObjects\UserData;

class AuthController extends Controller
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function unauthorized()
    {
        return response()->json([
            'error' => 'Não autorizado'
        ], 401);
    }

    public function login(UserRequest $request, LoginUserAction $action)
    {
        $data = AuthUserData::fromRequest($request);

        if (!$action($data)) {
            $this->unauthorized();
        }

        return [
            'token' => $action($data)
        ];

    }

    public function logout()
    {
        \auth()->logout();
    }

    public function refresh()
    {
        return [
            'token' => auth()->refresh()
        ];
    }

    public function create(UserRequest $request, CreateUserAction $action)
    {

        $data = UserData::fromRequest($request);

        $response = $action($data);

        return response()->json([
            'Success' => $response
        ], 200);
    }
}
