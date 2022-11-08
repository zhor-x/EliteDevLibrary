<?php

namespace App\DataTransferObjects\Api;

use App\Http\Requests\Api\RegistrationRequest;
use Spatie\DataTransferObject\DataTransferObject;

/**
 *
 */
class RegistrationForm extends DataTransferObject
{

    /**
     * @var string
     */
    public string $name;
    /**
     * @var string
     */
    public string $email;
    /**
     * @var string
     */
    public string $password;


    /**
     * @param  \App\Http\Requests\Api\RegistrationRequest  $request
     *
     * @return \App\DataTransferObjects\Api\RegistrationForm
     * @throws \Spatie\DataTransferObject\Exceptions\UnknownProperties
     */
    public static function fromRequest(RegistrationRequest $request): RegistrationForm
    {
        return new static([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),

        ]);
    }
}
