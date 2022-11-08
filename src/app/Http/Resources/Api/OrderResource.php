<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    #[ArrayShape([
        'status' => "string",
        'purchase_date' => "mixed",
        'book' => "\App\Http\Resources\Api\BookResource"
    ])] public function toArray($request): array|\JsonSerializable|\Illuminate\Contracts\Support\Arrayable
    {
        return [
            'status' => $this->rent == true ? 'rent' : 'buy',
            'purchase_date' => $this->created_at,
            'book' => BookResource::make($this->book),

        ];
    }
}
