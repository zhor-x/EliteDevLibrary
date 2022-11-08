<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class SearchBookRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape(['query' => "string"])]
    public function rules(): array
    {
        return [
            'query' => 'string|min:3|max:20'
        ];
    }
}
