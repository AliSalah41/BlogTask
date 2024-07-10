<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return [
            "id" 1,
            "name": "category1",
            "parent_id": null,
            "created_at": "2024-07-10T22:43:48.000000Z",
            "updated_at": "2024-07-10T22:43:48.000000Z",
            "children": [
        ];
    }
}
