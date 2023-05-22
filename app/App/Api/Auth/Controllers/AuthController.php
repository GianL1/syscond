<?php

namespace App\Api\Auth\Controllers;

use App\Api\User\Requests\UserRequest;
use App\Core\Http\Controllers\Controller;
use Domain\Auth\Actions\CreateUserAction;
use Domain\User\DataTransferObjects\UserData;
use Illuminate\Http\Client\Request;

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

    public function index()
    {
        return 'ok';
    }

    public function create(UserRequest $request, CreateUserAction $action)
    {

        $data = UserData::fromRequest($request);

        $response = $action($data);

        return response()->json([
            'Success' => $response
        ]);
    }
}
