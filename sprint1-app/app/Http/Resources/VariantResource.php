<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VariantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                 => $this->id,
            'product_id'         => $this->product_id,
            'title'              => $this->title,
            'price'              => $this->price,
            'position'           => $this->position,
            'compare_at_price'   => $this->compare_at_price,
            'option_1'           => $this->option_1,
            'option_2'           => $this->option_2,
            'option_3'           => $this->option_3,
            'inventory_quantity' => $this->inventory_quantity,
            'image_url'          => $this->image_url,
            'created_at'         => $this->created_at,
            'updated_at'         => $this->updated_at,
        ];
    }
}
