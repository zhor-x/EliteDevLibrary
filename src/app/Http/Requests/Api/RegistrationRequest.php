<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class RegistrationRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }


    #[ArrayShape(['name' => "string", 'email' => "string", 'password' => "string"])]
    public function rules(): array
    {
        return [
            'name' => 'required|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8|max:24'
        ];
    }
}
