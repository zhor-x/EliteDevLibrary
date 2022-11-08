<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;
use JetBrains\PhpStorm\ArrayShape;

class OrderRequest extends FormRequest
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
    #[ArrayShape(['book_id' => "string"])]
    public function rules(): array
    {
        return [
            'book_id' => 'required|int|exists:books,id'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge(['book_id' => $this->route('book_id')]);
    }
}
