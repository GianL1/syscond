<?php

namespace App\Api\User\Controllers;

use App\Core\Http\Controllers\Controller;


class UserController extends Controller
{
    private $loggedUser;

    public function __construct()
    {
        $this->middleware('auth:api');
        $this->loggedUser = auth()->user();
    }

}
