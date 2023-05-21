<?php

namespace App\Api\Task\Controllers;

use App\Api\Task\Requests\CondominoRequest;
use App\Core\Http\Controllers\Controller;
use Domain\Condomino\Actions\CreateCondominoAction;
use Domain\Condomino\DataTransferObjects\CondominoData;
use Domain\Condomino\Models\Condomino;

class CondominoController extends Controller
{
    public function index()
    {
        return 'ok';
    }

    public function store(CondominoRequest $request, CreateCondominoAction $action)
    {
        $data = CondominoData::fromRequest($request);

        $response = $action($data);
    }
}
