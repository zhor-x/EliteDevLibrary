<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    #[ArrayShape([
        'id' => "integer",
        'title' => "string",
        'year' => "string",
        'authors' => "AuthorResource",
        'image' => "string",
        'price' => 'float',
        'price_rent' => 'float',
    ])] public function toArray($request): array|\JsonSerializable|\Illuminate\Contracts\Support\Arrayable
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'year' => $this->year,
            'image' => $this->image,
            'price' => "$this->price$",
            'price_rent' => "$this->price_rent$",
            'authors' => AuthorResource::collection($this->authors),
        ];
    }
}
