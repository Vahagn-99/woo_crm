<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'parent_product_id' => $this->parent_product_id,
            'line_item_id' => $this->line_item_id,
            'price' => $this->price,
            'cost' => $this->cost,
            'product' => new ProductResource($this->whenLoaded('product')),
        ];
    }
}
