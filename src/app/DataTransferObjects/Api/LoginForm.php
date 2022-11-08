<?php

namespace App\DataTransferObjects\Api;

use App\Http\Requests\Api\LoginRequest;
use Spatie\DataTransferObject\DataTransferObject;

/**
 *
 */
class LoginForm extends DataTransferObject
{

    /**
     * @var string
     */
    public string $email;
    /**
     * @var string
     */
    public string $password;


    /**
     * @param  \App\Http\Requests\Api\LoginRequest  $request
     *
     * @return \App\DataTransferObjects\Api\LoginForm
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromRequest(LoginRequest $request): LoginForm
    {
        return new static([
            'email' => $request->input('email'),
            'password' => $request->input('password'),

        ]);
    }
}
