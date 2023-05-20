<?php

namespace Domain\Condomino\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class CondominoData extends DataTransferObject
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $password;

    public static function fromRequest(CondominoRequest $condominoRequest): CondominoData
    {
        return new Self([
            'name' => $condominoRequest['name'],
            'email' => $condominoRequest['email'],
            'password' => $condominoRequest['password']
        ]);
    }

}
