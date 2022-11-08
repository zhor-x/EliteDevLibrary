<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class AuthorResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    #[ArrayShape(['firstname' => "string", 'lastname' => "string"])]
    public function toArray($request): array|\JsonSerializable|\Illuminate\Contracts\Support\Arrayable
    {
        return [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname
        ];
    }
}
